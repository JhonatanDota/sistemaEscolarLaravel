<?php

namespace App\Http\Middleware;

use Closure;


class Admin
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
        if(isset($_SESSION['tipo_acesso']) && $_SESSION['tipo_acesso'] == 1)
            return $next($request);
        return redirect()->route('logado.home')->with('mensagem','Acesso restrito');
    }
}
