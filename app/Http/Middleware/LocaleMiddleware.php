<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = Session::get('lang') ??  'uz';
        Session::put('lang', $locale);
        App::setLocale($locale);

        return $next($request);
    }

}
