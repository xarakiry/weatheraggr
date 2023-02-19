<?php

declare(strict_types=1);

namespace App\OpenWeatherMap\ValueObjects;

class Weather
{
    private int $id;
    private string $main;
    private string $description;
    private string $icon;

    public function __construct(int $id, string $main, string $description, string $icon)
    {
        $this->id = $id;
        $this->main = $main;
        $this->description = $description;
        $this->icon = $icon;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMain(): string
    {
        return $this->main;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }
}
