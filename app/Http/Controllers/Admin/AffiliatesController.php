<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

   
    public function show($id)
    {
        if(!$affiliate = $this->affiliateRepository->find($id)){
            return redirect()->back();
        };

        return view('admin.pages.affiliates.show',compact('affiliate'));
    }
}
