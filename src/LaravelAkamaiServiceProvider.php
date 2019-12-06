<?php

namespace LaravelAkamai;

use Illuminate\Support\ServiceProvider;

class LaravelAkamaiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishConfiguration();
    }

    public function register()
    {
        $this->app->singleton('akamai', function ($app) {
            return new AkamaiManager(new AkamaiClient(new AkamaiConfiguration(config('akamai'))));
        });
    }

    private function publishConfiguration()
    {
        $this->publishes([
            __DIR__.'/../config/akamai.php' => config_path('akamai.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__.'/../config/akamai.php', 'akamai');
    }

    public function provides()
    {
        return 'akamai';
    }
}
