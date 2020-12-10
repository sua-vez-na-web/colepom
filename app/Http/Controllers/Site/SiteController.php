<?php

namespace App\Http\Controllers\Site;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateAffiliate;
use App\Models\Affiliate;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Promotion;
use App\Models\Role;
use App\Models\Syndicate;
use App\Models\User;
use App\Notifications\NewUserRegistration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();

        return view('site.pages.home.index', [
            'promotions' => $promotions
        ]);
    }

    public function promotions()
    {
        $promotions = Promotion::all();
        $categories = Category::all();


        return view('site.pages.promotions.index', [
            'promotions' => $promotions,
            'categories' => $categories
        ]);
    }


    public function partners()
    {
        $partners = Partner::all();
        $categories = Category::all();

        return view('site.pages.partners.index', [
            'partners' => $partners,
            'categories' => $categories
        ]);
    }

    public function syndicates()
    {
        $syndicates = Syndicate::all();
        $categories = Category::all();

        return view('site.pages.syndicates.index', [
            'syndicates' => $syndicates,
            'categories' => $categories
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
        return view('site.pages.partners.register');
    }

    public function SyndicateRegister()
    {

        return view('site.pages.syndicates.register');
    }

    public function storeAffiliate(StoreUpdateAffiliate $request)
    {
        $data = $request->all();

        $username = $request->first_name . "-" . $request->last_name;
        $user = User::createUserAccount($request->email, $username, Role::AFFILIATE);

        $data['user_id'] = $user->id;

        $affiliate = Affiliate::create($data);

        $user->notify(new NewUserRegistration($user));

        if ($affiliate) {
            //TODO: send email to affiliate
            return view('site.pages.affiliate.thank-you');
        }
    }

    public function storePartner(Request $request)
    {
        $user = User::create([
            'name' => $request->first_name,
            'email' => $request->email,
            'password' => bcrypt('colepom'),
            'role_id' => Role::PARTNER,

        ]);

        $user->partner()->create($request->all());

        $user->notify(new NewUserRegistration($user));

        return redirect()->route('site.index')->with('success', 'Obrigago pelo cadastro, em breve entraremos em contato');
    }

    public function storeSyndicate(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('colepom'),
            'role_id' => Role::SYNDICATE,

        ]);

        $user->syndicate()->create($request->all());

        $user->notify(new NewUserRegistration($user));

        return redirect()->route('site.index')->with('success', 'Obrigago pelo cadastro, em breve entraremos em contato');
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
                    'message' => "Cupom Revelado",
                    'code' => Str::upper($coupon->code),
                ], 200);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => "Você já resgatou esse cupom",
                    'code' => "********",
                ], 200);
            }
        } else {
            return response()->json([
                'success' => true,
                'message' => "Desculpe, Nenhum Cupom Disponível",
                'code' => "*******",
            ], 200);
        }
    }
}
