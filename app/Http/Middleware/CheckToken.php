<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $excludeRoutes = [
            'api/login',
            'api/register',
            'api/users/*',
            'api/users'
        ];

        // if request in path login and register then return next request
        if (in_array($request->path(), $excludeRoutes)){
            return $next($request);
        }

        foreach($excludeRoutes as $path)
        {
            if (fnmatch($path, $request->path())){
                return $next($request);
            }
        }

        if (!$request->bearerToken()){
            return response()->json([
                'status' => 'error',
                'message' => 'Authentication token not provided',
                'details' => 'Please include a Bearer token in your request headers'
            ], 401);
        }

        // token available but is not valid token
        if (!auth()->guard('sanctum')->check())
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid token',
                'details' => 'Token is invalid or has expired'
            ], 401);
        }

        return $next($request);
    }
}
