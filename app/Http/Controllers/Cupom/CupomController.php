<?php

namespace App\Http\Controllers\Cupom;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CupomController extends BaseController
{
  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      if(session()->get('ass') == NULL || session()->get('associado_password') == NULL) {
        return redirect()->route('logarAssociado');
      } else {
        return $next($request);
      }
    });
  }

  public function cupom(Request $request)
  {
    return 'cupom';
  }
}