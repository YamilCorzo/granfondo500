<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('RouteIsName', function ($expression) {
            return "<?php if (Request::routeIs($expression)): ?>";
        });
        Blade::directive('RouteNotIsName', function ($expression) {
            return "<?php if (!Request::routeIs($expression)): ?>";
        });

        Blade::directive('IsIntro', function ($expression = null) {
            return "<?php if (Request::routeIs('login')): ?>";
        });
    }
}
