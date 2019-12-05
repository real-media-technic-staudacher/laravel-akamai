<?php

namespace LaravelAkamai;

use Illuminate\Support\Arr;

class AkamaiConfiguration
{
    public $host;

    public function __construct(array $config)
    {
        $this->host = Arr::get($config, 'host');
    }

    public function setHost(string $host)
    {
        $this->host = $host;

        return $this;
    }
}
