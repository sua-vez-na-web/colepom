<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function index()
    {
        $plans = Plan::latest()->get();

        return view('admin.pages.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(Request $request)
    {
        Plan::create($request->all());

        return redirect()->route('plans.index')->with('msg', 'Plano Cadastrado!');
    }
}
