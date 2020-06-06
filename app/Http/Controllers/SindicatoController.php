<?php

namespace App\Http\Controllers;

use Request;

class SindicatoController extends Controller
{

    public function index(Request $request)
    {
        $login = session()->get('login-sindicato');
        if ( !$login ) {
            return view('sindicato');
        }

        return view('sindicato');
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
