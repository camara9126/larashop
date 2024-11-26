<?php

namespace App\Providers;

use App\Services\PayTech;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PayTech::class, function ($app) {
            return new PayTech(
                config('services.paytech.api_key'),
                config('services.paytech.api_secret')
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
