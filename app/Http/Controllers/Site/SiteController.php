<?php

namespace App\Http\Controllers\Site;

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

    public function showRegistrationForm()
    {
        $syndicates = Syndicate::pluck('name', 'id');

        return view('site.pages.affiliate.register', compact('syndicates'));
    }

    public function registerAffiliate(StoreUpdateAffiliate $request)
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
}
