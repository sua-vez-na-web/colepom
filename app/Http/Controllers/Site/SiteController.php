<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateAffiliate;
use App\Models\Affiliate;
use App\Models\Category;
use App\Models\Promotion;
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

    public function showPromotion($id)
    {
        $promotion = Promotion::find($id);

        return view('site.pages.promotions.show', compact('promotion'));
    }

    public function showRegistrationForm()
    {
        $syndicates = Syndicate::pluck('fantasy_name', 'id');

        return view('site.pages.affiliate.register', compact('syndicates'));
    }

    public function registerAffiliate(StoreUpdateAffiliate $request)
    {
        $data = $request->all();

        $user = User::createUserAccount($request->email, $request->first_name, $request->last_name, User::AFFILIATE);

        $data['user_id'] = $user->id;

        $affiliate = Affiliate::create($data);

        if ($affiliate) {
            //TODO: send email to affiliate
            return view('site.pages.affiliate.thank-you');
        }
    }
}
