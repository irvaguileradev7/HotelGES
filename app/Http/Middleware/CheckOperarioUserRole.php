<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOperarioUserRole
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $roleId = $user->role_id;

        if ($roleId === 1) {
            return $next($request);
        }

        return redirect('/')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}
