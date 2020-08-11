<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePromotion;
use App\Models\Category;
use App\Models\Promotion;
use Illuminate\Support\Str;
use App\Models\Store;
use Illuminate\Support\Facades\Storage;

class PromotionsController extends Controller
{
    private $promotionRepository, $categoryRepository, $storyRepository;

    public function __construct(Promotion $promotion, Category $category, Store $store)
    {
        $this->promotionRepository = $promotion;
        $this->categoryRepository = $category;
        $this->storyRepository = $store;
    }

    public function index()
    {
        $promotions = $this->promotionRepository->paginate();
        return view('admin.pages.promotions.index', compact('promotions'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->pluck('name', 'id');
        $stores = $this->storyRepository->pluck('name', 'id');
        return view('admin.pages.promotions.create', compact('categories', 'stores'));
    }


    public function store(StoreUpdatePromotion $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('promotions');
        }

        $this->promotionRepository->create($data);

        return redirect()->route('promotions.index');
    }


    public function show($id)
    {
        if (!$promotion = $this->promotionRepository->find($id)) {
            return redirect()->back();
        };

        return view('admin.pages.promotions.show', compact('promotion'));
    }


    public function edit($id)
    {
        if (!$promotion = $this->promotionRepository->find($id)) {
            return redirect()->back();
        };
        $categories = $this->categoryRepository->pluck('name', 'id');
        $stores = $this->storyRepository->pluck('name', 'id');
        return view('admin.pages.promotions.edit', compact('promotion', 'categories', 'stores'));
    }


    public function update(StoreUpdatePromotion $request, $id)
    {

        if (!$promotion = $this->promotionRepository->find($id)) {
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
        if (!$promotion = $this->promotionRepository->find($id)) {
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
