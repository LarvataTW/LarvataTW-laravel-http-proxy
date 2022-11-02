<?php

namespace Larvata\LaravelHttpProxy;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;


class LaravelHttpProxyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravelhttpproxy');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravelhttpproxy');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravelhttpproxy.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravelhttpproxy'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravelhttpproxy'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravelhttpproxy'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
         $this->loadRoutesFrom(base_path().'/routes/httpproxy.php');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravelhttpproxy');

        // Register the main class to use with the facade
        $this->app->singleton('laravelhttpproxy', function () {
            return new LaravelHttpProxy;
        });
    }
}
