<?php

namespace LaravelSalatNotifier\Providers;

use Illuminate\Support\ServiceProvider;

class SalatNotifierServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/salatnotifier.php', 'salatnotifier');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/salatnotifier.php' => config_path('salatnotifier.php'),
        ], 'salatnotifier-config');

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        }
    }
}