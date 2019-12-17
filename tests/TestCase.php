<?php

namespace LaravelAkamaiTest;

use LaravelAkamai\LaravelAkamaiServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            LaravelAkamaiServiceProvider::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        config()->set('akamai', [
            'baseUrl'     => env('AKAMAI_URL', 'https://api.akamai.com'),
            'clientToken' => env('AKAMAI_CLIENT_TOKEN', 'AKAMAI_CLIENT_TOKEN not set'),
            'accessToken' => env('AKAMAI_ACCESS_TOKEN', 'AKAMAI_ACCESS_TOKEN not set'),
            'secret'      => env('AKAMAI_SECRET', 'AKAMAI_SECRET not set'),
        ]);
        //Storage::fake('secondLocal');
    }
}
