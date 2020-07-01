<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateStore;
use App\Models\Store;

class StoresController extends Controller
{
    private $storeRepository;

    public function __construct(Store $store)
    {
        $this->storeRepository = $store;
    }

    public function index()
    {
        $stores = $this->storeRepository->paginate();
        return view('admin.pages.stores.index',compact('stores'));
    }

    public function create()
    {
      return view('admin.pages.stores.create');
    }

    
    public function store(StoreUpdateStore $request)
    {
        $this->storeRepository->create($request->all());

        return redirect()->route('stores.index');
    }

    
    public function show($id)
    {
        if(!$store = $this->storeRepository->find($id)){
            return redirect()->back();
        };

        return view('admin.pages.stores.show',compact('store'));
    }

    
    public function edit($id)
    {
        if(!$store = $this->storeRepository->find($id)){
            return redirect()->back();
        };

        return view('admin.pages.stores.edit',compact('store'));
    }

   
    public function update(StoreUpdateStore $request, $id)
    {
        
        if(!$store = $this->storeRepository->find($id)){
            return redirect()->back();
        };

        $store->update($request->all());

        return redirect()->route('stores.index');
    }

    public function destroy($id)
    {
        if(!$store = $this->storeRepository->find($id)){
            return redirect()->back();
        };

        $store->delete();

        return redirect()->route('stores.index');
    }
}