<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePartner;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Role;

class PartnersController extends Controller
{
    private $partnerRepository, $categoryRepository;

    public function __construct(Partner $partner, Category $category)
    {
        $this->partnerRepository = $partner;
        $this->categoryRepository = $category;
    }

    public function index()
    {
        $partners = $this->partnerRepository->paginate();
        return view('admin.pages.partners.index', compact('partners'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->pluck('name', 'id');
        return view('admin.pages.partners.create', compact('categories'));
    }


    public function store(StoreUpdatePartner $request)
    {
        $this->partnerRepository->create($request->all());

        return redirect()->route('partners.index');
    }


    public function show($id)
    {
        if (!$partner = $this->partnerRepository->find($id)) {
            return redirect()->back();
        };

        return view('admin.pages.partners.show', compact('partner'));
    }


    public function edit($id)
    {
        if (!$partner = $this->partnerRepository->find($id)) {
            return redirect()->back();
        };

        $categories = $this->categoryRepository->pluck('name', 'id');
        return view('admin.pages.partners.edit', compact('partner', 'categories'));
    }


    public function update(StoreUpdatePartner $request, $id)
    {

        if (!$partner = $this->partnerRepository->find($id)) {
            return redirect()->back();
        };

        $partner->update($request->all());

        return redirect()->route('partners.index');
    }

    public function destroy($id)
    {
        if (!$partner = $this->partnerRepository->find($id)) {
            return redirect()->back();
        };

        $partner->delete();

        return redirect()->route('partners.index');
    }
}
