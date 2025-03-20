<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            // Ne pas rediriger si on est déjà sur /login ou /register
            if ($request->routeIs('login') || $request->routeIs('register')) {
                return redirect(RouteServiceProvider::home());
            }
        }

        return $next($request);
    }
}
