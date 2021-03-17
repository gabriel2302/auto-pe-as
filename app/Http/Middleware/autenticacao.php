<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class autenticacao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('user-agent') === '') {
            return redirect(route('login'));
        }
        if(!$request->session()->exists('usuario_status')){
            return redirect(route('login'));
        }
        return $next($request);
    }
}
