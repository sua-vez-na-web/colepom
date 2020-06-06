<?php

namespace App\Http\Controllers\Parceiro;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Parceiro\ParceiroLoginController;
use App\Parceiro\Parceiro;
use App\Parceiro\ParceiroFrontendModel;
use Hash;

class ParceiroController extends BaseController
{
  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      if(session()->get('parc') == NULL || session()->get('parceiro_password') == NULL) {
        return redirect()->route('index');
      } else {
        return $next($request);
      }
    });
  }

  public function index()
  {
    $parceiro_id = session()->get('parceiro_id');
    $parceiroFront = new ParceiroFrontendModel();

    $parceiro = $parceiroFront->selectParceiro($parceiro_id);
    $promocoes = $parceiroFront->getPromocoes($parceiro_id);

    return view('parceiro', compact('parceiro','promocoes'));
  }
}