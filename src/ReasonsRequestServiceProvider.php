<?php

namespace Codificar\ReasonsRequest;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class ReasonsRequestServiceProvider extends ServiceProvider 
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Load blade templates
        $this->loadViewsFrom(__DIR__.'/resources/views', 'reasons');

        // Load trans files
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'reasonsrequest');

        // Load Migrations
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

        $this->publishes([
            __DIR__.'/Database/seeders' => database_path('seeders')
        ], 'public_vuejs_libs');

        $this->publishes([
            __DIR__.'/../public/js' => public_path('vendor/codificar/reasons-request'),
        ], 'public_vuejs_libs');

        // Publish the tests files 
        $this->publishes([
            __DIR__ . '/../tests/' => base_path('tests/Unit/libs/reason'),
        ], 'publishes_tests');
    }

    public function register()
    {

    }
}