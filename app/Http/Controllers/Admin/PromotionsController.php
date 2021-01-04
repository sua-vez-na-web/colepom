<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePromotion;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\Role;
use Illuminate\Support\Str;
use App\Models\Store;
use App\Services\Promotion\CreateCoupons;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PromotionsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == Role::ADMINISTRATOR) {
            $promotions = Promotion::latest()->get();
        } else {
            $promotions = Promotion::where('partner_id', $user->partner->id)->get();
        }
        return view('admin.pages.promotions.index', compact('promotions'));
    }

    public function create()
    {
        $user = Auth::user();

        if ($user->role_id == Role::ADMINISTRATOR) {
            $stores = Store::pluck('name', 'id');
        } else {
            $stores = Store::where('partner_id', $user->partner->id)->pluck('name', 'id');
        }

        $categories = Category::pluck('name', 'id');

        return view('admin.pages.promotions.create', compact('categories', 'stores'));
    }


    public function store(StoreUpdatePromotion $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('promotions');
        }
        $user = Auth::user();

        if ($user->role_id == Role::ADMINISTRATOR) {
            $store = Store::find($request->store_id);
            $data['partner_id'] = $store->partner->id;
        } else {
            $data['partner_id'] = $user->partner->id;
        }

        $promotion = Promotion::create($data);

        CreateCoupons::execute($promotion);

        return redirect()->route('promotions.index');
    }


    public function show($id)
    {
        if (!$promotion = Promotion::find($id)) {
            return redirect()->back();
        };

        return view('admin.pages.promotions.show', compact('promotion'));
    }


    public function edit($id)
    {
        if (!$promotion = Promotion::find($id)) {
            return redirect()->back();
        };
        $categories = Category::pluck('name', 'id');
        $stores = Store::pluck('name', 'id');
        return view('admin.pages.promotions.edit', compact('promotion', 'categories', 'stores'));
    }


    public function update(StoreUpdatePromotion $request, $id)
    {

        if (!$promotion = Promotion::find($id)) {
            return redirect()->back();
        };

        $data = $request->all();

        if ($request->hasFile('image')) {
            Storage::delete($promotion->image);

            $data['image'] = $request->image->store('promotions');
        }

        $promotion->update($data);

        return redirect()->route('promotions.index');
    }

    public function destroy($id)
    {
        if (!$promotion = Promotion::find($id)) {
            return redirect()->back();
        };

        $promotion->delete();

        return redirect()->route('promotions.index');
    }

    public function generateCode()
    {
        $code = strtoupper(Str::random(8));

        return response()->json($code, 200);
    }
}
