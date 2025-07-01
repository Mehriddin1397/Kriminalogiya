<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictLoginByIP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowed_ips = ['213.230.99.98', '192.168.40.18','127.0.0.1']; // ruxsat berilgan IP'lar

        if (!in_array($request->ip(), $allowed_ips)) {
            abort(403, 'Sizning IP manzilingizga kirish taqiqlangan.');
        }

        return $next($request);
    }
}
