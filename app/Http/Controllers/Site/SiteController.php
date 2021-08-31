<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\StoreUpdateAffiliate;
use App\Http\Requests\StoreUpdatePartner;
use App\Http\Requests\StoreUpdateSyndicate;
use App\Models\Affiliate;
use App\Models\AffiliateCoupom;
use App\Models\Category;
use App\Models\City;
use App\Models\Models\Contact;
use App\Models\Partner;
use App\Models\Plan;
use App\Models\Promotion;
use App\Models\Role;
use App\Models\State;
use App\Models\Store;
use App\Models\Syndicate;
use App\Models\User;
use App\Notifications\NewContactForm;
use App\Notifications\NewUserRegistration;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function index()
    {
        $promotions = Promotion::where('is_aprooved', true)->get();

        return view('site.pages.home.index', [
            'promotions' => $promotions
        ]);
    }

    public function promotions()
    {
        $promotions = Promotion::where('is_aprooved', true)->get();
        $categories = Category::all();


        return view('site.pages.promotions.index', [
            'promotions' => $promotions,
            'categories' => $categories,
            'states' => State::all(),
            'table' => 'stores'
        ]);
    }


    public function partners(Request $request)
    {
        return view('site.pages.partners.index', [
            'partners' => Partner::where('is_aprooved', true)->get(),
            'categories' => Category::all(),
            'states' => State::all(),
            'table' => 'partner'
        ]);
    }

    public function syndicates()
    {
        $syndicates = Syndicate::where('is_aprooved', true)->take(20)->latest()->get();

        return view('site.pages.syndicates.index', [
            'syndicates' => $syndicates,
            'states' => State::all(),
            'table' => 'syndicate'
        ]);
    }

    public function showPromotion($id)
    {
        $promotion = Promotion::find($id);

        return view('site.pages.promotions.show', compact('promotion'));
    }

    public function AffiliateRegister()
    {
        $syndicates = Syndicate::pluck('name', 'id');
        return view('site.pages.affiliate.register', compact('syndicates'));
    }

    public function PartnerRegister()
    {
        $categories = Category::pluck("name", "id");
        return view('site.pages.partners.register', compact('categories'));
    }

    public function SyndicateRegister()
    {
        return view('site.pages.syndicates.register');
    }

    public function storeAffiliate(StoreUpdateAffiliate $request)
    {
        $data = $request->all();

        $username = $request->first_name . "-" . $request->last_name;
        $user = User::createUserAccount($request->email, $username, Role::AFFILIATE, $request->password);

        $data['user_id'] = $user->id;

        $affiliate = Affiliate::create($data);

        $user->notify(new NewUserRegistration($user));

        if ($affiliate) {
            return redirect()->route('site.index')->with('msg', 'Obrigado pelo cadastro, em breve entraremos em contato');
        }
    }

    public function storePartner(StoreUpdatePartner $request)
    {
        $user = User::create([
            'name' => $request->first_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => Role::PARTNER,

        ]);

        $data = $request->all();
        $data['uf_code'] = $request->state ? State::getCodeByUf($request->state) : null;
        $data['city_code'] = City::getCodeByIbge($request->ibge);

        $user->partner()->create($data);

        $user->notify(new NewUserRegistration($user));

        return redirect()->route('site.index')->with('msg', 'Obrigado pelo cadastro, em breve entraremos em contato');
    }

    public function storeSyndicate(StoreUpdateSyndicate $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => Role::SYNDICATE,

        ]);

        $data = $request->all();
        $data['uf_code'] = $request->state ? State::getCodeByUf($request->state) : null;
        $data['city_code'] = City::getCodeByIbge($request->ibge);


        $syndicate = $user->syndicate()->create($data);

        $user->notify(new NewUserRegistration($user));

        return redirect()->route('plans.select', $syndicate->id);
    }

    public function showPartner($id)
    {
        $partner = Partner::find($id);
        $stores = $partner->stores()->pluck('id');
        $promotions = Promotion::whereIn('store_id', $stores)->get();

        return view('site.pages.partners.partner', [
            'partner' => $partner,
            'stores' => $stores,
            'promotions' => $promotions
        ]);
    }

    public function showSyndicate($id)
    {
        return view('site.pages.syndicates.syndicate', [
            'syndicate' => Syndicate::find($id)
        ]);
    }

    public function redeemCoupon($promotion_id)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => "Faça Login pra Resgatar",
                'code' => null
            ], 200);
        }

        if (!$promotion = Promotion::find($promotion_id)) {
            return response()->json([
                'success' => false,
                'message' => "Promoção Não Disponível",
                'code' => null
            ], 200);
        }

        $coupon = Promotion::getCouponAvailable($promotion);

        if ($coupon) {
            $user = Auth::user();
            if (User::redeemCuponToUser($user, $coupon)) {
                return response()->json([
                    'success' => true,
                    'message' => "Cupom Resgatado",
                    'code' => Str::upper($coupon->code),
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Você já resgatou esse cupom",
                    'code' => "********",
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => "Desculpe, Nenhum Cupom Disponível",
                'code' => "*******",
            ], 200);
        }
    }

    public function affiliatesCupons()
    {
        $user = Auth::user();
        $coupons = AffiliateCoupom::where("user_id", $user->id)->get();

        return view('site.pages.affiliate.coupons', compact('coupons'));
    }

    public function affiliatesGetProfile()
    {
        $user = Auth::user();
        $profile = Affiliate::where('user_id', $user->id)->first();

        return view('site.pages.affiliate.profile', compact('profile'));
    }

    public function affiliatesUpdateProfile(Request $request)
    {
        $user = Auth::user();
        $profile = Affiliate::where('user_id', $user->id)->first();
        $profile->update($request->all());

        return redirect()->back()->with('msg', 'Seus Dados Foram Atualizados!');
    }

    public function partersSearch(Request $request)
    {
        $partners = Partner::searchPartners($request->estado, $request->cidade, $request->category);

        return view('site.pages.partners.index', [
            'partners' => $partners,
            'categories' => Category::all(),
            'states' => State::all(),
            'table' => 'partner'
        ]);
    }

    public function syndicateSearch(Request $request)
    {
        $syndicates = Syndicate::searchSyndicates($request->estado, $request->cidade);

        return view('site.pages.partners.index', [
            'partners' => $syndicates,
            'states' => State::all(),
            'table' => 'syndicate'
        ]);
    }

    public function promotionSearch(Request $request)
    {
        $stores = Store::searchStores($request->estado, $request->cidade);

        $promotions = Promotion::whereIn('store_id', $stores->pluck('id'))
            ->when($request->has('category'), function ($query) use ($request) {
                $query->whereIn('category_id', $request->category);
            })->get();

        return view('site.pages.promotions.index', [
            'promotions' => $promotions,
            'categories' => Category::all(),
            'states' => State::all(),
            'table' => 'stores'
        ]);
    }

    public function plansSelect($syndicate)
    {
        $syndicate = Syndicate::find($syndicate);
        $plans = Plan::all();

        return view('site.pages.syndicates.plans-select', compact('plans', 'syndicate'));
    }

    public function syndicateSubscribe(Request $request)
    {
        $syndicate = Syndicate::find($request->syndicate_id);

        if ($syndicate) {
            $plan = Plan::find($request->plan_id);
            $syndicate->subscription()->create(
                [
                    'cycle' => $plan->cycle,
                    'plan_id' => $plan->id,
                    'description' => $plan->description,
                    'a_value' => $plan->amount
                ]
            );

            return redirect()->route('site.index')->with('msg', 'Obrigado pelo cadastro, em breve entraremos em contato');
        }
    }

    public function contact(ContactStoreRequest $request)
    {
        $message = $request->all();

        $contact = Contact::create($message);
        
        $contact->notify(new NewContactForm());
        
        return redirect()->back()->with('msg', 'Sua mensagem foi enviada com sucesso, obrigado!');
    }
}
