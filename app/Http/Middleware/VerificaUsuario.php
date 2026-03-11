<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class VerificaUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si la sesión del usuario está activa o no
        if(!Auth::check()){
            return redirect()->route('registro')
            ->with('error', 'Se debe iniciar sesión');
        }

        // Si está iniciada la sesión, entonces se puede continuar
        return $next($request);
    }
}
