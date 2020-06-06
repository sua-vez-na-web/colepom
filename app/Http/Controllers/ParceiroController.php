<?php

namespace App\Http\Controllers;

use Request;

class ParceiroController extends Controller
{

    public function index(Request $request)
    {
        $login = session()->get('login-parceiro');
        if ( !$login ) {
            return view('parceiro');
        }

        return view('parceiro');
    }

    public function registro(Request $request)
    {

    }

    public function sair(Request $request)
    {

    }

    public function atualizar(Request $request)
    {

    }



    /**
     * Futuramente mover para API
     */
    public function login(Request $request)
    {

    }

    public function registrar(Request $request)
    {

    }

}
