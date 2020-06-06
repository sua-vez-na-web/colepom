<?php

namespace App\Http\Controllers\Associado;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Associado\AssociadoLoginController;
use App\Associado\Associado;
use App\Associado\AssociadoFrontendModel;
use App\Sindicato;
use Hash;

class AssociadoController extends BaseController
{
  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      if(session()->get('ass') == NULL || session()->get('associado_password') == NULL) {
        return redirect()->route('index');
      } else {
        return $next($request);
      }
    });
  }

  public function index()
  {
    $associadoFront = new AssociadoFrontendModel();
    $associado = $associadoFront->selectAssociado(session()->get('associado_id'));
    return view('associado', compact('associado'));
  }

  public function atualizar(Request $request)
  {
    $associadoFront = new AssociadoFrontendModel();
    $data = [
      'ASS_NOME' => $request->nome,
      'ASS_EMAIL' => $request->email,
    ];

    if ($request->senha) {
      $data += ['ASS_SENHA' => Hash::make($request->senha)];
    }

    $associadoFront->updateAssociado($request->id, $data);

    return back()->with('status_associado', 'Atualizado com sucesso');;
  }

}
