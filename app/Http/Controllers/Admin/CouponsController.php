<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Promotion;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCoupon;
use App\Http\Requests\UpdateCoupon;

class CouponsController extends Controller
{

    private $couponRepository;

    public function __construct(Coupon $coupon)
    {
        $this->couponRepository = $coupon;
    }

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

    public function edit($id){
        $cupom = Coupon::find($id);
        $promotion = Promotion::find($cupom->promotion_id);
        $promotions = Promotion::get()->all();

        return view('admin.pages.coupons.edit', compact('cupom', 'promotion', 'promotions'));
    }
    
    public function update(UpdateCoupon $request, $id){
        if (!$coupon = $this->couponRepository->find($id)) {
            return redirect()->back()->with('no', 'Falha ao processar solicitação');
        };

        $coupon->update($request->all());

        return redirect()->route('coupons.edit', $coupon->id)->with('yes', 'Cupom atualizado');
    }

    public function create(){
        $promotions = Promotion::get()->all();

        return view('admin.pages.coupons.create', compact('promotions'));
    }

    public function store(StoreCoupon $request)
    {
        Coupon::create($request->all());

        return redirect()->route('coupons.index');
    }

}
