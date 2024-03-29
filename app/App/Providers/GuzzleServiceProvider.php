<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class GuzzleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('guzzle', function () {
            return new Client;
        });
    }
}