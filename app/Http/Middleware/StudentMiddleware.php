<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check() && Auth::user()->isStudent()) {
            return $next($request);
        } else {
            return response()->json(['message' => 'Forbidden!'], 403);
        }
    }
}
