<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotion;

class SiteController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('site.pages.home.index',[
            'promotions' => $promotions
        ]);
    }

    public function promotions()
    {
        $promotions = Promotion::all();
        
        return view('site.pages.promotions.index',[
            'promotions' => $promotions
        ]);
    }
}
