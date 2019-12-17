<?php

namespace LaravelAkamaiTest;

use GuzzleHttp\Psr7\Response;
use LaravelAkamai\AkamaiManager;

class PurgeByUrlTest extends TestCase
{

    /** @test */
    public function it_instantiate_akamai_manager_out_of_servicecontainer()
    {
        $akamaiManager = $this->app->make(AkamaiManager::class);

        $this->assertInstanceOf(AkamaiManager::class, $akamaiManager);
    }

    /** @test */
    public function it_sends_data_to_akaimai()
    {
        /** @var AkamaiManager $akamaiManager */
        $akamaiManager = $this->app->make(AkamaiManager::class);

        $akamaiManager->fakeClient([
            new Response(201, [],
                '{"detail": "Request accepted", "estimatedSeconds": 5, "purgeId": "b772824a-20ae-11ea-8b33-f7644e0595be", "supportId": "17PY1576574536233341-188220608", "httpStatus": 201}'),
        ]);

        $response = $akamaiManager->purgeUrl('http://some.valid.url');

        $this->assertTrue($response->success);
        $this->assertEquals(201, $response->code);
        $this->assertEquals('b772824a-20ae-11ea-8b33-f7644e0595be', $response->akamaiResponse->purgeId);
    }

    /** @test */
    public function it_handles_error_invalid_url_properly()
    {
        /** @var AkamaiManager $akamaiManager */
        $akamaiManager = $this->app->make(AkamaiManager::class);

        $akamaiManager->fakeClient([
            new Response(403, [],
                '{"supportId": "17PY1576572861552226-256009408", "httpStatus": 403, "detail": "http://some.invalid.url", "title": "unauthorized arl", "describedBy": "https://developer.akamai.com/api/core_features/fast_purge/v3.html#httpcodes"}'),
        ]);

        $url = 'http://some.invalid.url';
        $response = $akamaiManager->purgeUrl($url);

        $this->assertFalse($response->success);
        $this->assertEquals($url, $response->akamaiResponse->detail);
        $this->assertEquals(403, $response->code);
    }

    /** @test */
    public function it_handles_error_with_authentication_properly()
    {
        /** @var AkamaiManager $akamaiManager */
        $akamaiManager = $this->app->make(AkamaiManager::class);

        $akamaiManager->fakeClient([
            new Response(400, [],
                '{ "type": "https://problems.purge.akamaiapis.net/-/pep-authn/request-error", "title": "Bad request", "status": 400, "detail": "Invalid client token", "instance": "https://akab-trpzwgjmyu6c7a2i-he2ob73u5owzf2sq.purge.akamaiapis.net/ccu/v3/invalidate/url", "method": "POST", "serverIp": "95.100.77.200", "clientIp": "212.123.97.90", "requestId": "1458c14b", "requestTime": "2019-12-17T09:48:16Z" }'),
        ]);

        $response = $akamaiManager->purgeUrl('http://some.invalid.url');

        $this->assertFalse($response->success);
        $this->assertEquals('Invalid client token', $response->akamaiResponse->detail);
        $this->assertEquals(400, $response->code);
    }
}
