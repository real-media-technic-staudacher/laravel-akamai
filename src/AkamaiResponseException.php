<?php

namespace LaravelAkamai;

use Exception;
use GuzzleHttp\Exception\ClientException;

class AkamaiResponseException extends Exception
{
    /** * @var ClientException $e */
    private $e;

    public static function byClientException(ClientException $e)
    {
        $body = json_decode((string)$e->getResponse()->getBody());

        return new static($body->title, $body->httpStatus, $e);
    }
}
