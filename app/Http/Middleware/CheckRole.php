<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Map the role parameter to the user_role column values
        if ($role === 'super_admin' && !$user->isSuperAdmin()) {
            abort(403);
        }

        if ($role === 'admin' && !$user->isAdmin()) {
            abort(403);
        }

        if ($role === 'standard' && !$user->isStandard()) {
            abort(403);
        }

        return $next($request);
    }
}
