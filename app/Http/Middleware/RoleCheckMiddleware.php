<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {

        if(auth()->check() && auth()->user()->role === $role) {
            return $next($request);
        }

        return response()->json([
            'success' => "False!",
            'message' => "You cannot not access this route!"
        ],403);
    }
}
