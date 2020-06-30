<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSyndicate;
use App\Models\Syndicate;

class SyndicatesController extends Controller
{
    private $syndicateRepository;

    public function __construct(Syndicate $syndicate)
    {
        $this->syndicateRepository = $syndicate;
    }

    public function index()
    {
        $syndicates = $this->syndicateRepository->paginate();
        return view('admin.pages.syndicates.index',compact('syndicates'));
    }

    
    public function create()
    {
      return view('admin.pages.syndicates.create');
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

        return view('admin.pages.syndicates.edit',compact('syndicate'));
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
