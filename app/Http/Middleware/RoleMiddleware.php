<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Enums\Role;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();
        if (!$user) {
            abort(403);
        }

        $allowed = collect($roles)->contains(fn($r) => $user->role->value === $r);
        if(!$allowed) {
            abort(403, 'Unauthorized (role');
        }

        return $next($request);
    }

}
