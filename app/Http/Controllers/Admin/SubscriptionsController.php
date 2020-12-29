<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionsController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();

        return view('admin.pages.subscriptions.index', compact('subscriptions'));
    }

    public function show($id)
    {
        $subscription = Subscription::find($id);

        return view('admin.pages.subscriptions.show', compact('subscription'));
    }
}
