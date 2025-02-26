<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check()) {
            if (Auth::user()->role !== $role) {
                return redirect('/home'); // Reindirizza se non ha il ruolo corretto
            }
        }

        return $next($request);
    }
}
