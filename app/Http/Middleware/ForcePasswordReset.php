<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForcePasswordReset
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->force_pw_reset) {
            // Allow access to password reset routes
            if (!$request->routeIs('password.*') && !$request->routeIs('logout')) {
                return redirect()->route('password.force-reset')
                    ->with('warning', 'You must reset your password before continuing.');
            }
        }

        return $next($request);
    }
}
