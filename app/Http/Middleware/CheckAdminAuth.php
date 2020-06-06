<?php

namespace App\Http\Middleware;

use Closure;

use App\Admin;
use Illuminate\Support\Facades\Hash;

class CheckAdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $email = session('admin');
        $password = session('password');

        if(isset($email) && isset($password)) {

            $admin = Admin::where('ADM_EMAIL', $email)->where('ADM_ATIVADO', 'S')->first();
            
            if (isset($admin) && Hash::check($password, $admin->ADM_SENHA)) {
                // okay
                return $next($request);
            }
        }
        //return $next($request);
        return redirect()->route('admin_login')->with('Erro: Você deve estar logado para acessar está página');
    }
}
