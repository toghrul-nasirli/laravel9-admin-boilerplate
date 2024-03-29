<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (strtolower(auth()->user()->role->name) === 'admin') {
            return $next($request);
        }

        abort(401);
    }
}
