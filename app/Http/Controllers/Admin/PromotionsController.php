<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePromotion;
use App\Models\Promotion;

class PromotionsController extends Controller
{
    private $promotionRepository;

    public function __construct(Promotion $promotion)
    {
        $this->promotionRepository = $promotion;
    }

    public function index()
    {
        $promotions = $this->promotionRepository->paginate();
        return view('admin.pages.promotions.index',compact('promotions'));
    }

    public function create()
    {
      return view('admin.pages.promotions.create');
    }

    
    public function store(StoreUpdatePromotion $request)
    {
        $this->promotionRepository->create($request->all());

        return redirect()->route('promotions.index');
    }

    
    public function show($id)
    {
        if(!$promotion = $this->promotionRepository->find($id)){
            return redirect()->back();
        };

        return view('admin.pages.promotions.show',compact('promotion'));
    }

    
    public function edit($id)
    {
        if(!$promotion = $this->promotionRepository->find($id)){
            return redirect()->back();
        };

        return view('admin.pages.promotions.edit',compact('promotion'));
    }

   
    public function update(StoreUpdatePromotion $request, $id)
    {
        
        if(!$promotion = $this->promotionRepository->find($id)){
            return redirect()->back();
        };

        $promotion->update($request->all());

        return redirect()->route('promotions.index');
    }

    public function destroy($id)
    {
        if(!$promotion = $this->promotionRepository->find($id)){
            return redirect()->back();
        };

        $promotion->delete();

        return redirect()->route('promotions.index');
    }
}
