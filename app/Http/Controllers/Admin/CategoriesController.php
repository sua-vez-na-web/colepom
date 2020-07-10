<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategory;
use App\Models\Category;
use App\Models\Role;

class CategoriesController extends Controller
{
    private $categoryRepository,$rolesRepository;

    public function __construct(Category $category,Role $role)
    {
        $this->categoryRepository = $category;
        $this->rolesRepository = $role;
    }

    public function index()
    {
        $categories = $this->categoryRepository->paginate();        
        return view('admin.pages.categories.index',compact('categories'));
    }

    public function create()
    {
      $roles = $this->rolesRepository->pluck('name','id');       
      return view('admin.pages.categories.create',compact('roles'));
    }

    
    public function store(StoreUpdateCategory $request)
    {
        $this->categoryRepository->create($request->all());

        return redirect()->route('categories.index');
    }

    
    public function show($id)
    {
        if(!$category = $this->categoryRepository->find($id)){
            return redirect()->back();
        };

        return view('admin.pages.categories.show',compact('category'));
    }

    
    public function edit($id)
    {
        if(!$category = $this->categoryRepository->find($id)){
            return redirect()->back();
        };
        $roles = $this->rolesRepository->pluck('name','id');       
        return view('admin.pages.categories.edit',compact('category','roles'));
    }

   
    public function update(StoreUpdateCategory $request, $id)
    {
        
        if(!$category = $this->categoryRepository->find($id)){
            return redirect()->back();
        };

        $category->update($request->all());

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        if(!$category = $this->categoryRepository->find($id)){
            return redirect()->back();
        };

        $category->delete();

        return redirect()->route('categories.index');
    }
}
