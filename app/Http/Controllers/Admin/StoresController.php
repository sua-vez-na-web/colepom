<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateStore;
use App\Models\Category;
use App\Models\City;
use App\Models\Partner;
use App\Models\Role;
use App\Models\State;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoresController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == Role::ADMINISTRATOR) {
            $stores = Store::all();
        } else {
            $stores = Store::where('partner_id', $user->partner->id)->get();
        }

        return view('admin.pages.stores.index', compact('stores'));
    }

    public function create()
    {
        $user = Auth::user();

        if ($user->role_id == Role::ADMINISTRATOR) {
            $partners = Partner::pluck('name', 'id');
        } else {
            $partners = Partner::where('user_id', $user->id)->pluck('name', 'id');
        }

        $categories = Category::pluck('name', 'id');

        return view('admin.pages.stores.create', compact('categories', 'partners'));
    }


    public function store(StoreUpdateStore $request)
    {

        $data = $request->all();
        $data['uf_code'] = $request->province ? State::getCodeByUf($request->state) : null;
        $data['city_code'] = City::getCodeByIbge($request->ibge);

        if ($request->hasFile('image')) {

            $data['brand'] = $request->image->store('stores');
        }

        Store::create($data);

        return redirect()->route('stores.index');
    }


    public function show($id)
    {
        if (!$store = Store::find($id)) {
            return redirect()->back();
        };

        return view('admin.pages.stores.show', compact('store'));
    }


    public function edit($id)
    {
        if (!$store = Store::find($id)) {
            return redirect()->back();
        };

        $user = Auth::user();

        if ($user->role_id == Role::ADMINISTRATOR) {
            $partners = Partner::pluck('name', 'id');
        } else {
            $partners = Partner::where('user_id', $user->id)->pluck('name', 'id');
        }

        $categories = Category::pluck('name', 'id');
        return view('admin.pages.stores.edit', compact('store', 'categories', 'partners'));
    }


    public function update(StoreUpdateStore $request, $id)
    {

        if (!$store = Store::find($id)) {
            return redirect()->back();
        };

        $data = $request->all();
        $data['uf_code'] = $request->province ? State::getCodeByUf($request->state) : null;
        $data['city_code'] = City::getCodeByIbge($request->ibge);

        if ($request->hasFile('image')) {
            Storage::delete($store->image);
            $data['brand'] = $request->image->store('stores');
        }

        $store->update($data);

        return redirect()->route('stores.index');
    }

    public function destroy($id)
    {
        if (!$store = Store::find($id)) {
            return redirect()->back();
        };

        $store->delete();

        return redirect()->route('stores.index');
    }
}
