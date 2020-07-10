<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSyndicate;
use App\Models\Category;
use App\Models\Role;
use App\Models\Syndicate;

class SyndicatesController extends Controller
{
    private $syndicateRepository,$categoryRepository;

    public function __construct(Syndicate $syndicate,Category $category)
    {
        $this->syndicateRepository = $syndicate;
        $this->categoryRepository = $category;
    }

    public function index()
    {
        $syndicates = $this->syndicateRepository->paginate();
        return view('admin.pages.syndicates.index',compact('syndicates'));
    }

    
    public function create()
    {
      $categories = $this->categoryRepository->where('role_id',Role::SYNDICATE)
                            ->pluck('name','id');
      return view('admin.pages.syndicates.create',compact('categories'));
    }

    
    public function store(StoreUpdateSyndicate $request)
    {
        $this->syndicateRepository->create($request->all());

        return redirect()->route('syndicates.index');
    }

    
    public function show($id)
    {
        if(!$syndicate = $this->syndicateRepository->find($id)){
            return redirect()->back();
        };

        return view('admin.pages.syndicates.show',compact('syndicate'));
    }

    
    public function edit($id)
    {
        if(!$syndicate = $this->syndicateRepository->find($id)){
            return redirect()->back();
        };
        $categories = $this->categoryRepository->where('role_id',Role::SYNDICATE)
                            ->pluck('name','id');
        return view('admin.pages.syndicates.edit',compact('syndicate','categories'));
    }

   
    public function update(StoreUpdateSyndicate $request, $id)
    {
        
        if(!$syndicate = $this->syndicateRepository->find($id)){
            return redirect()->back();
        };

        $syndicate->update($request->all());

        return redirect()->route('syndicates.index');
    }

    public function destroy($id)
    {
        if(!$syndicate = $this->syndicateRepository->find($id)){
            return redirect()->back();
        };

        $syndicate->delete();

        return redirect()->route('syndicates.index');
    }
}
