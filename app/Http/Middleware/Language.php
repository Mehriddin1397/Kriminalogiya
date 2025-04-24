<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class Language
{public function handle(Request $request, Closure $next): Response
{
    // Get the language from the URL if it's present
    $lang = $request->route('lang'); // Fetching the language from the route paramete
    if ($lang) {
        Session::put('lang', $lang); // Set the language in session
        App::setLocale($lang); // Set the application locale
    } elseif (Session::has('lang')) {
        App::setLocale(Session::get('lang')); // If session has language, set it
    }

    return $next($request);
}

}
