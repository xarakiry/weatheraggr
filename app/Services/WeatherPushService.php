<?php

namespace App\Services;

use App\ValueObjects\Weather;

class WeatherPushService
{
    private ExternalWeatherPushInterface $externalWeatherPush;

    public function __construct(ExternalWeatherPushInterface $externalWeatherPush)
    {
        $this->externalWeatherPush = $externalWeatherPush;
    }

    public function push(Weather $weather): void
    {
        $this->externalWeatherPush->push($weather->getTemperature(), $weather->getHumidity());
    }
}
