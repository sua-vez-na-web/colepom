<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use App\Models\Partner;
use App\Models\Syndicate;

class DashboardController extends Controller
{
    public function index()
    {
        $syndicates = Syndicate::all()->count();
        $affiliates = Affiliate::all()->count();
        $partners = Partner::all()->count();
        return view('admin.pages.dashboard.index', compact('syndicates', 'affiliates', 'partners'));
    }
}
