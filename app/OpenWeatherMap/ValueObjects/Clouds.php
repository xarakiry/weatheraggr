<?php

declare(strict_types=1);

namespace App\OpenWeatherMap\ValueObjects;

class Clouds
{
    private int $all;

    public function __construct(int $all)
    {
        $this->all = $all;
    }

    public function getAll(): int
    {
        return $this->all;
    }
}
