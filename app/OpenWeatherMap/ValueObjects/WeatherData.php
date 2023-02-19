<?php

declare(strict_types=1);

namespace App\OpenWeatherMap\ValueObjects;

class WeatherData
{
    private Coord $coord;
    private array $weather;
    private string $base;
    private Main $main;
    private int $visibility;
    private Wind $wind;
    private Clouds $clouds;
    private string $dt;
    private Sys $sys;
    private int $timezone;
    private int $id;
    private string $name;
    private int $cod;

    public function __construct(
        Coord $coord,
        array $weather,
        string $base,
        Main $main,
        int $visibility,
        Wind $wind,
        Clouds $clouds,
        string $dt,
        Sys $sys,
        int $timezone,
        int $id,
        string $name,
        int $cod
    ) {
        $this->coord = $coord;
        $this->weather = $weather;
        $this->base = $base;
        $this->main = $main;
        $this->visibility = $visibility;
        $this->wind = $wind;
        $this->clouds = $clouds;
        $this->dt = $dt;
        $this->sys = $sys;
        $this->timezone = $timezone;
        $this->id = $id;
        $this->name = $name;
        $this->cod = $cod;
    }

    public function getCoord(): Coord
    {
        return $this->coord;
    }

    public function getWeather(): array
    {
        return $this->weather;
    }

    public function getBase(): string
    {
        return $this->base;
    }

    public function getMain(): Main
    {
        return $this->main;
    }

    public function getVisibility(): int
    {
        return $this->visibility;
    }

    public function getWind(): Wind
    {
        return $this->wind;
    }

    public function getClouds(): Clouds
    {
        return $this->clouds;
    }

    public function getDt(): string
    {
        return $this->dt;
    }

    public function getSys(): Sys
    {
        return $this->sys;
    }

    public function getTimezone(): int
    {
        return $this->timezone;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCod(): int
    {
        return $this->cod;
    }
}
