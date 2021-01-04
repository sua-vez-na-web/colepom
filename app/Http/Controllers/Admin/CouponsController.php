<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Promotion;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class CouponsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == Role::ADMINISTRATOR) {
            $coupons = Coupon::latest()->get();
        } else {
            $promotions = Promotion::where('partner_id', $user->partner->id)->pluck('id');

            $coupons = Coupon::whereIn('promotion_id', $promotions)->get();
        }

        return view('admin.pages.coupons.index', compact('coupons'));
    }
}
