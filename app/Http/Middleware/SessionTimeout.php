<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    // Necha daqiqa ichida harakatsizlik bo'lsa, logout qilinadi (masalan, 10 daqiqa)
    protected $timeout = 10 * 60; // soniyalarda

    public function handle($request, Closure $next)
    {
        if (!session()->has('lastActivityTime')) {
            session(['lastActivityTime' => time()]);
        } elseif (time() - session('lastActivityTime') > $this->timeout) {
            session()->forget('lastActivityTime');
            Auth::logout(); // foydalanuvchini chiqaramiz
            return redirect()->route('login')->with('message', 'Session timeout, iltimos qayta login qiling.');
        }

        session(['lastActivityTime' => time()]); // faoliyatni yangilab boramiz

        return $next($request);
    }
}
