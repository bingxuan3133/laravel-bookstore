<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check()) {
            return redirect()->route('login')->with('failed', 'Please login');
        }

        if (!auth()->check() || !auth()->user()->role || auth()->user()->role->name !== 'Admin') {
            abort(Response::HTTP_FORBIDDEN, 'Unauthorized - Admin access required.');
        }

        return $next($request);
    }
}
