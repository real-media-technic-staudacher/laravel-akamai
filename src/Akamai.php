<?php

namespace LaravelAkamai;

use Illuminate\Support\Facades\Facade;

class Akamai extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'akamai';
    }
}
