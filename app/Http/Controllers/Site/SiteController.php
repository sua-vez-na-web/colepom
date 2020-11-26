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
use Illuminate\Support\Facades\DB;

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

        if ($affiliate) {
            //TODO: send email to affiliate
            return view('site.pages.affiliate.thank-you');
        }
    }

    public function storePartner(Request $request)
    {
        return $request->all();
    }

    public function storeSyndicate(Request $request)
    {
        return $request->all();
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


    public function about()
    {
        $data = Setting::select('value')->where('param', Setting::ABOUT_TEXT)->first();
        return view('site.pages.about', compact('data'));
    }

    public function policy()
    {
        $data = Setting::select('value')->where('param', Setting::PRIVACY_POLICY_TEXT)->first();
        return view('site.pages.policy', compact('data'));
    }

    public function terms()
    {
        $data = Setting::select('value')->where('param', Setting::USE_TERMS_TEXT)->first();
        return view('site.pages.terms', compact('data'));
    }

    public function contact()
    {
        return view('site.pages.contact');
    }
}
