<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
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
            $contact = Contact::find(2); // Baza orqali olingan ma'lumot
            $view->with('contact', $contact); // Har bir view ga uzatish
        });
    }



}
