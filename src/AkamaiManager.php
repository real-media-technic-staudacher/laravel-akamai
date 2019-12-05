<?php

namespace LaravelAkamai;

class AkamaiManager
{
    /** @var AkamaiConfiguration $configuration */
    private $configuration;

    public function __construct(AkamaiConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function test()
    {
        dd($this);
    }
}
