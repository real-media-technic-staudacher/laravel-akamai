<?php

namespace LaravelAkamaiTest;

use LaravelAkamai\AkamaiManager;

class PurgeByUrlTest extends TestCase
{
    /** @test */
    public function it_instantiate_akamai_manager_out_of_servicecontainer()
    {
        $akamaiManager = $this->app->make('akamai');

        $this->assertInstanceOf(AkamaiManager::class, $akamaiManager);
    }
}
