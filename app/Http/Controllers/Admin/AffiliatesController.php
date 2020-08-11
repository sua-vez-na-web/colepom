<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateAffiliate;
use App\Models\Affiliate;

class AffiliatesController extends Controller
{
    private $affiliateRepository;

    public function __construct(Affiliate $affiliate)
    {
        $this->affiliateRepository = $affiliate;
    }

    public function index()
    {
        $affiliates = $this->affiliateRepository->all();
        return view('admin.pages.affiliates.index',compact('affiliates'));
    }   

    public function create()
    {
      return view('admin.pages.affiliates.create');
    }

    
    public function store(StoreUpdateAffiliate $request)
    {
        $this->affiliateRepository->create($request->all());

        return redirect()->route('affiliates.index');
    }

   
    public function show($id)
    {
        if(!$affiliate = $this->affiliateRepository->find($id)){
            return redirect()->back();
        };

        return view('admin.pages.affiliates.show',compact('affiliate'));
    }

    public function edit($id)
    {
        if(!$affiliate = $this->affiliateRepository->find($id)){
            return redirect()->back();
        };

        return view('admin.pages.affiliates.edit',compact('affiliate'));
    }

   
    public function update(StoreUpdateAffiliate $request, $id)
    {
        
        if(!$affiliate = $this->affiliateRepository->find($id)){
            return redirect()->back();
        };

        $affiliate->update($request->all());

        return redirect()->route('affiliates.index');
    }

    public function destroy($id)
    {
        if(!$affiliate = $this->affiliateRepository->find($id)){
            return redirect()->back();
        };

        $affiliate->delete();

        return redirect()->route('affiliates.index');
    }
}
