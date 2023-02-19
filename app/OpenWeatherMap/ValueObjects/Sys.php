<?php

declare(strict_types=1);

namespace App\OpenWeatherMap\ValueObjects;

class Sys
{
    private int $type;
    private int $id;
    private string $country;
    private string $sunrise;
    private string $sunset;

    public function __construct(int $type, int $id, string $country, string $sunrise, string $sunset)
    {
        $this->type = $type;
        $this->id = $id;
        $this->country = $country;
        $this->sunrise = $sunrise;
        $this->sunset = $sunset;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getSunrise(): string
    {
        return $this->sunrise;
    }

    public function getSunset(): string
    {
        return $this->sunset;
    }
}
