<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::directive('uang', function ($expression) {
            return "Rp. {{ number_format($expression,0,',','.'); }}";
        });
        Blade::directive('nominal', function ($expression) {
            return "{{ number_format($expression,0,',','.');}}";
        });
        Blade::directive('uangold', function ($expression) {
            return "Rp.number_format($expression,0,',','.');";
        });

        Blade::directive('diskon', function ($expression) {
            return "{{ number_format($expression,0,',','.');}}%";
        });

        Blade::directive('rating', function ($expression) {
            return "{{ number_format($expression,1,',','.'); }}";
        });
    }
}
