<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckOperator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    //  SI SE DESCOMENTA ESTA FUNCION
    //  EL PROCESO DE RESSERVACION NO FUNCIONARA
    /* public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role_id !=3)
        {
            abort(403, 'No tiene permiso para acceder a esta pagina');
        }
        return $next($request);
    } */
}
