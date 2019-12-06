<?php

namespace LaravelAkamai;

use Illuminate\Support\Arr;

class AkamaiConfiguration
{
    public $baseUrl;
    public $clientToken;
    public $accessToken;
    public $secret;

    public function __construct(array $config)
    {
        $this->baseUrl = Arr::get($config, 'baseUrl');
        $this->clientToken = Arr::get($config, 'clientToken');
        $this->accessToken = Arr::get($config, 'accessToken');
        $this->secret = Arr::get($config, 'secret');
    }

    public function withBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    public function withClientToken(string $clientToken)
    {
        $this->clientToken = $clientToken;

        return $this;
    }

    public function withAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    public function withSecret(string $secret)
    {
        $this->secret = $secret;

        return $this;
    }
}
