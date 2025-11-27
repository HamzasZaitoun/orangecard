<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {

            return redirect()->route('login');
        }

        $user = auth()->user();

        // Check if user is active
        if (!$user->is_active) {
            auth()->logout();
            return redirect()->route('login')->with('error', 'Your account has been deactivated.');
        }

        // Role validation
        $allowed = match ($role) {
            'super_admin' => $user->isSuperAdmin(),
            'admin' => $user->isAdmin(),
            'standard' => $user->isStandard(),
            default => false,
        };

        if (!$allowed) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
