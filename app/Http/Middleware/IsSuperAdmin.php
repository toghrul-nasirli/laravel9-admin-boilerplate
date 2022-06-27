<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsSuperAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (strtolower(auth()->user()->role->name) === 'admin' && auth()->user()->id === 1) {
            return $next($request);
        }

        abort(401);
    }
}
