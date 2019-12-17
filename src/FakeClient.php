<?php

namespace LaravelAkamai;

use Akamai\Open\EdgeGrid\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;

class FakeClient
{
    protected $client;

    public function __construct(array $expectedResponses)
    {
        $mock = new MockHandler($expectedResponses);

        $handler = HandlerStack::create($mock);
        $this->client = new Client(['handler' => $handler]);
    }

    public function get(string $endpoint, array $options = [])
    {
        return $this->client->get($endpoint, $options);
    }

    public function post(string $endpoint, array $options = [])
    {
        return $this->client->post($endpoint, $options);
    }
}
