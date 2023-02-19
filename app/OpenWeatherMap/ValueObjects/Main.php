<?php

declare(strict_types=1);

namespace App\OpenWeatherMap\ValueObjects;

class Main
{
    private float $temp;
    private float $feels_like;
    private float $temp_min;
    private float $temp_max;
    private int $pressure;
    private int $humidity;

    public function __construct(
        float $temp,
        float $feels_like,
        float $temp_min,
        float $temp_max,
        int $pressure,
        int $humidity
    ) {
        $this->temp = $temp;
        $this->feels_like = $feels_like;
        $this->temp_min = $temp_min;
        $this->temp_max = $temp_max;
        $this->pressure = $pressure;
        $this->humidity = $humidity;
    }

    public function getTemp(): float
    {
        return $this->temp;
    }

    public function getFeelsLike(): float
    {
        return $this->feels_like;
    }

    public function getTempMin(): float
    {
        return $this->temp_min;
    }

    public function getTempMax(): float
    {
        return $this->temp_max;
    }

    public function getPressure(): int
    {
        return $this->pressure;
    }

    public function getHumidity(): int
    {
        return $this->humidity;
    }
}
