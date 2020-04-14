<?php

namespace Tombabolewski\Openiai;

use Illuminate\Support\ServiceProvider;
use Tombabolewski\Openiai\Client;

class OpeniaiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/openiai.php', 'openiai');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/openiai.php' => config_path('openiai.php'),
        ]);
        $this->app->bind('openiai', function ($app) {
            return new Client();
        });
    }
}
