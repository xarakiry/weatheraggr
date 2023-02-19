<?php

namespace App\Listeners;

use App\Events\WeatherUpdated;
use App\Services\WeatherPushService;

class WeatherUpdatedHandler
{
    private WeatherPushService $pushService;

    /**
     * Create the event listener.
     */
    public function __construct(WeatherPushService $pushService)
    {
        $this->pushService = $pushService;
    }

    /**
     * Handle the event.
     */
    public function handle(WeatherUpdated $event): void
    {
        $this->pushService->push($event->getWeather());
    }
}
