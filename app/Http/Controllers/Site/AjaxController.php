<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;

class AjaxController extends Controller
{
    public function ajaxCidades(Request $request)
    {
        return City::where('uf', $request->uf)->get();
    }
}
