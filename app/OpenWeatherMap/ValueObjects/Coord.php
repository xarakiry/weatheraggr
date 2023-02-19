<?php

declare(strict_types=1);

namespace App\OpenWeatherMap\ValueObjects;

class Coord
{
    private float $lon;
    private float $lat;

    public function __construct(float $lon, float $lat)
    {
        $this->lon = $lon;
        $this->lat = $lat;
    }

    public function getLon(): float
    {
        return $this->lon;
    }

    public function getLat(): float
    {
        return $this->lat;
    }
}
