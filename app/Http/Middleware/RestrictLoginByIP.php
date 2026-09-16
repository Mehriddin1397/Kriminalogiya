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
        $clientIp = $request->ip();
        $allowed_ips = ['213.230.99.98', '192.168.40.18', '192.168.40.39', '192.168.40.111', '127.0.0.1'];

        $isLocalSubnet = str_starts_with($clientIp, '192.168.40.') || str_starts_with($clientIp, '127.0.0.');

        if (!in_array($clientIp, $allowed_ips) && !$isLocalSubnet) {
            abort(403, 'Sizning IP manzilingiz (' . $clientIp . ') orqali kirish taqiqlangan.');
        }

        return $next($request);
    }
}
