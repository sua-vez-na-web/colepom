<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AffiliateCoupom;
use App\Models\Coupon;
use App\Models\Promotion;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliatesCouponsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == Role::ADMINISTRATOR) {
            $affiliatesCoupons = AffiliateCoupom::all();
            return view('admin.pages.affiliates-coupons.index', compact('affiliatesCoupons'));
        } else {

            $affiliatesCoupons = AffiliateCoupom::where('partner_id', $user->partner->id)->get();

            return view('admin.pages.affiliates-coupons.index', compact('affiliatesCoupons'));
        }
    }

    public function show($id)
    {
        if (!$affiliatesCoupon = AffiliateCoupom::find($id)) {
            return redirect()->back();
        }

        $usable = !now()->greaterThan($affiliatesCoupon->coupon->promotion->redeem_expiration_date);

        // dd($usable, $affiliatesCoupon->coupon->promotion->redeem_expiration_date);
        return view('admin.pages.affiliates-coupons.show', compact('affiliatesCoupon', 'usable'));
    }

    public function confirm($id)
    {
        $affiliatesCoupon = AffiliateCoupom::find($id);
        $affiliatesCoupon->is_used = 1;
        $affiliatesCoupon->used_at = now();
        $affiliatesCoupon->save();

        return redirect()->back();
    }
}
