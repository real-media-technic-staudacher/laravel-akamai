<?php

namespace LaravelAkamaiTest;

use Illuminate\Contracts\Console\Kernel;
use LaravelAkamai\AkamaiClient;

class PurgeByUrlTest extends \Illuminate\Foundation\Testing\TestCase
{
    /** @test */
    public function it_instantiate_akamai_manager_out_of_servicecontainer()
    {
        $akamaiManager = $this->app->make('akamai-client');

        $this->assertInstanceOf(AkamaiClient::class, $akamaiManager);
    }

    /**
     * @inheritDoc
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../../../../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
