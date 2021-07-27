<?php

namespace App\Http\Middleware;

use Closure;


class Login
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
        session_start();

        if(isset($_SESSION['email']) && isset($_SESSION['nome']))
            return $next($request);
        return redirect()->route('sistema.login')->with('mensagem','Usuário ou senha incorretos');
    }
}
