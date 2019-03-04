<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::directive('verified', function () {
            return '<?php if(Auth::user()->verified): ?>';
        });

        Blade::directive('endverified', function () {
            return '<?php endif; ?>';
        });
    }
}
