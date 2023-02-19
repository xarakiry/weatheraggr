<?php

namespace App\Events;

use App\ValueObjects\Weather;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WeatherUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Weather $weather;

    public function __construct(Weather $weather)
    {
        $this->weather = $weather;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('weather'),
        ];
    }

    public function getWeather(): Weather
    {
        return $this->weather;
    }
}
