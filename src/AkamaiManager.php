<?php

namespace LaravelAkamai;

class AkamaiManager
{
    /** @var AkamaiClient $client */
    private $client;

    public function __construct(AkamaiClient $client)
    {
        $this->client = $client;
    }

    public function purgeUrl(string $url)
    {
        $response = $this->client->get('/billing-usage/v1/products');
    }
}
