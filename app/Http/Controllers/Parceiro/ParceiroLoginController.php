<?php

namespace App\Http\Controllers\Parceiro;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Parceiro\Parceiro;
use Hash;

class ParceiroLoginController extends BaseController
{
  function login(Request $request) 
  {
    $email = $request->email;
    $password = $request->password;

    $ass = Parceiro::where('PAR_EMAIL', $email)->where('PAR_ATIVADO', 'S')->first();
    if(isset($ass)) {
      if (Hash::check($password, $ass->PAR_SENHA)) {
        session(['tipo' => 'PARCEIRO', 'parc' => $email, 'parceiro_password'=>$password, 'parceiro_id'=>$ass->PAR_ID]);
        return redirect()->route('parceiro');
      }
    }
    return redirect()->route('index')->with('erro', 'Erro: Login e/ou Senha inválidos');
  }


  function registrar_action(Request $request) 
  {
    $associado = associado::find($request->id);
    if($associado) {
        //update
        $associado->SIN_ID = $request->sindicato;
        $associado->ASS_NOME = $request->nome;
        $associado->ASS_EMAIL = $request->email;
        $associado->ASS_NASCIMENTO= $request->nascimento;
        $associado->ASS_GENERO = $request->genero;
        $associado->ASS_EMPRESA = $request->empresa;
        $associado->ASS_FUNCAO = $request->funcao;
        $associado->ASS_CPF = $request->CPF;
        $associado->ASS_CEP = $request->CEP;
        $associado->ASS_UF = $request->UF;
        $associado->ASS_CIDADE = $request->cidade;
        $associado->ASS_BAIRRO = $request->bairro;
        $associado->ASS_RUA = $request->rua;
        $associado->ASS_NUMERO = $request->numero;
        $associado->ASS_COMPLEMENTO = $request->complemento;
        if ($request->senha) {
          $associado->ASS_SENHA = bcrypt($request->senha);
        }

        $associado->save();
        return redirect()->route('associado')->with('sucesso', 'Associado alterado com sucesso');

    } else {
        //create
        $newAssociado = new Associado();
        $newAssociado->SIN_ID = $request->sindicato;
        $newAssociado->ASS_NOME = $request->nome;
        $newAssociado->ASS_EMAIL = $request->email;
        $newAssociado->ASS_NASCIMENTO= $request->nascimento;
        $newAssociado->ASS_GENERO = $request->genero;
        $newAssociado->ASS_EMPRESA = $request->empresa;
        $newAssociado->ASS_FUNCAO = $request->funcao;
        $newAssociado->ASS_CPF = $request->CPF;
        $newAssociado->ASS_CEP = $request->CEP;
        $newAssociado->ASS_UF = $request->UF;
        $newAssociado->ASS_CIDADE = $request->cidade;
        $newAssociado->ASS_BAIRRO = $request->bairro;
        $newAssociado->ASS_RUA = $request->rua;
        $newAssociado->ASS_NUMERO = $request->numero;
        $newAssociado->ASS_COMPLEMENTO = $request->complemento;
        $newAssociado->ASS_SENHA = bcrypt($newAssociado->senha);
        $newAssociado->ASS_ATIVADO = 'N';
        $newAssociado->save();

        return redirect()->route('ass_registrar')->with('sucesso', 'Associado criado com sucesso');
    }
  }

  public function logout()
  {
    session()->put('tipo',  null);
    session()->put('ass',  null);
    session()->put('associado_password',  null);
    return redirect()->route('index');
  }

}
