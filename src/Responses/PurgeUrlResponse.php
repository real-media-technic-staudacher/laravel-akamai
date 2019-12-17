<?php

namespace LaravelAkamai\Responses;

use GuzzleHttp\Exception\ClientException;

class PurgeUrlResponse
{
    /** @var bool $success */
    public $success;

    /** @var bool $code */
    public $code;

    /** @var bool $message */
    public $message;

    /** * @var object $akamaiResponse */
    public $akamaiResponse;

    public function __construct(bool $success, int $code, string $message, object $akamaiResponse)
    {
        $this->success = $success;
        $this->code = $code;
        $this->message = $message;
        $this->akamaiResponse = $akamaiResponse;
    }
    
    public static function byClientExecption(ClientException $e): self
    {
        $response = json_decode((string)$e->getResponse()->getBody());

        $message = sprintf('%s (%s)', $response->title, $response->detail);

        return new static(false, $response->httpStatus ?? $response->status, $message, $response);
    }

    public static function bySuccessfullResponse(object $response): self
    {
        return new static(true, $response->httpStatus, $response->detail, $response);
    }
}
