<?php

namespace App\Whatagraph;

use App\Services\ExternalWeatherPushInterface;
use App\Whatagraph\DTO\Data;
use App\Whatagraph\DTO\Weather;

class PushService extends WhatagraphBase implements ExternalWeatherPushInterface
{
    public function push(float $temperature, float $humidity): bool
    {
        $response = $this->sendPost(
            new Data([
                new Weather(
                    $temperature,
                    $humidity,
                    1,
                    'app'
                )

            ])
        );

        var_dump($response->body());

        return $response->successful();
    }
}
