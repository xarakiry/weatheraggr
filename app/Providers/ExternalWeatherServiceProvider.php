<?php

namespace App\Providers;

use App\Services\ExternalWeatherPushInterface;
use App\Whatagraph\PushService;
use Illuminate\Support\ServiceProvider;

class ExternalWeatherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ExternalWeatherPushInterface::class,
            static function ($app) {
                return new PushService(
                    config('whatagraph.key', '')
                );
            }
        );
    }
}
