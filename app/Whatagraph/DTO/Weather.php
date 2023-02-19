<?php

namespace App\Whatagraph\DTO;

class Weather implements \JsonSerializable
{
    private float $temperature;
    private float $humidity;
    private int $impressions;
    private string $device;

    public function __construct(float $temperature, float $humidity, int $impressions, string $device)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->impressions = $impressions;
        $this->device = $device;
    }

    public function jsonSerialize(): array
    {
        return [
            'temperature' => $this->temperature,
            'humidity' => $this->humidity,
            'impressions' => $this->impressions,
            'device' => $this->device,
            'date' => (new \DateTime())->format('Y-m-d')
        ];
    }
}
