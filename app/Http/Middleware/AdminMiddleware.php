<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //comprova que estiga inicia la sesio i que siga Admin i si no es aixina te torna a "home"
        if(auth()->check() && auth()->user()->isAdmin == 1){
            return $next;
        }

        return redirect()->route('home')->width('error', 'Access denied. You are not admin');
    }
}
