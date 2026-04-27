<?php

namespace App\Providers;

use App\Http\Middleware\RestrictLoginByIP;
use App\Models\Contact;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Agar sessiyada 'locale' mavjud bo'lsa, uni o'qib olish
        $locale = session('lang', config('app.locale'));
        App::setLocale($locale);


        View::composer('*', function ($view) {
            $contact = Cache::remember('contact_data_1', now()->addHours(6), fn () => Contact::find(1));
            $view->with('contact', $contact);
        });
    }



}
