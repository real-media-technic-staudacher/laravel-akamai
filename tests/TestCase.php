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
        //config()->set('backup.monitor_backups.0.health_checks', []);
        //Storage::fake('secondLocal');
    }
}
