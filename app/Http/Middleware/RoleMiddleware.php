<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    const ROLE_ADMIN = 'ADMIN';
    const ROLE_USER = 'USER';

    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role !== self::ROLE_ADMIN) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
