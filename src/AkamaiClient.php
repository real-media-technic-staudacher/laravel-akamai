<?php

namespace LaravelAkamai;

use Akamai\Open\EdgeGrid\Client;

class AkamaiClient
{
    protected $client;

    public function __construct(AkamaiConfiguration $configuration)
    {
        $this->client = new Client([
            'base_uri' => $configuration->baseUrl,
        ]);

        $this->client->setAuth(
            $configuration->clientToken,
            $configuration->secret,
            $configuration->accessToken
        );
    }

    public function get(string $endpoint, array $options = [])
    {
        return $this->client->get($endpoint, $options);
    }
}
