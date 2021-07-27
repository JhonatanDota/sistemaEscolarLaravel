<?php

namespace App\Http\Middleware;

use Closure;


class Permissoes
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
        if($_SESSION['tipo_acesso'] == 1 || $_SESSION['tipo_acesso'] == 2)
            return $next($request);
        return redirect()->route('logado.home')->with('mensagem','Acesso restrito');
    }
}
