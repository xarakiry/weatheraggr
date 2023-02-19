<?php

namespace App\Services;

use App\ValueObjects\Weather;

interface ExternalWeatherPushInterface
{
    /**
     * Pushes weather data to the third party service
     *
     * @param float $temperature
     * @param float $humidity
     * @return bool
     */
    public function push(float $temperature, float $humidity): bool;
}
