<?php

namespace App\Http\Middleware;

use Closure;
use Debugbar;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DebugbarPluginExclusionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
//    public function handle(Request $request, Closure $next): Response
//    {
//        return $next($request);
//    }

    public function handle(Request $request, Closure $next): Response
    {
        // Check if it's a POST request and disable the plugin data
        if ($request->isMethod('post')) {
            Debugbar::disable();
        }

        return $next($request);
    }
}
