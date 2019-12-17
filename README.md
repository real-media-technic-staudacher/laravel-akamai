# laravel-akamai

A simple AKAMAI API integration for Laravel

Services available so far:

- Purge by URL

## Installation / Setup

`composer require rmts/laravel-akamai`

## Usage

### Purge by URL

Using the Facade

```
use LaravelAkamai\Akamai;

/** PurgeUrlResponse $response **/
$response = Akamai::purgeUrl('http://my-asset.url');

if ($response->success) {
    Log::info("Success");
} else {
    Log::warning("Failed to purge from CDN: {$response->message}");
}
```

## Testing

Run the tests with:

``` bash
composer test
```