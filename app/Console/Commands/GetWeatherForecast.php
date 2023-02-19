<?php

namespace App\Console\Commands;

use App\Events\WeatherUpdated;
use App\OpenWeatherMap\ValueObjects\Clouds;
use App\OpenWeatherMap\ValueObjects\Coord;
use App\OpenWeatherMap\ValueObjects\Main;
use App\OpenWeatherMap\ValueObjects\Sys;
use App\OpenWeatherMap\ValueObjects\WeatherData;
use App\OpenWeatherMap\ValueObjects\Wind;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use RakibDevs\Weather\Weather;

class GetWeatherForecast extends Command
{
    private const CACHE_KEY = 'weatherck';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieves updated weather data';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        if (!Cache::has(self::CACHE_KEY)) {
            $owmAdapter = new Weather();
            $owmResponseData = $owmAdapter->getCurrentByCity('Baku');
            $weatherData = $this->weatherDataFactory($owmResponseData);

            Cache::put(self::CACHE_KEY, json_encode($owmResponseData, JSON_THROW_ON_ERROR), 10);
        } else {
            $weatherData = $this->weatherDataFactory(json_decode(Cache::get(self::CACHE_KEY), false));
        }

        WeatherUpdated::dispatch(
            new \App\ValueObjects\Weather(
                $weatherData->getMain()->getTemp(),
                $weatherData->getMain()->getHumidity()
            )
        );
    }

    private function weatherDataFactory(\stdClass $owmResponseData): WeatherData
    {
        return new WeatherData(
            new Coord($owmResponseData->coord->lon, $owmResponseData->coord->lat),
            $this->weatherFactory($owmResponseData->weather),
            $owmResponseData->base,
            $this->mainFactory($owmResponseData->main),
            $owmResponseData->visibility,
            new Wind($owmResponseData->wind->speed, $owmResponseData->wind->deg),
            new Clouds($owmResponseData->clouds->all),
            $owmResponseData->dt,
            $this->sysFactory($owmResponseData->sys),
            $owmResponseData->timezone,
            $owmResponseData->id,
            $owmResponseData->name,
            $owmResponseData->cod,
        );
    }

    private function mainFactory(\stdClass $mainObj): Main
    {
        return new Main(
            $mainObj->temp,
            $mainObj->feels_like,
            $mainObj->temp_min,
            $mainObj->temp_max,
            $mainObj->pressure,
            $mainObj->humidity
        );
    }

    private function sysFactory(\stdClass $sysObject): Sys
    {
        return new Sys(
            $sysObject->type,
            $sysObject->id,
            $sysObject->country,
            $sysObject->sunrise,
            $sysObject->sunset,
        );
    }

    private function weatherFactory(array $weather): array
    {
        return array_map(
            static function ($weather) {
                return new \App\OpenWeatherMap\ValueObjects\Weather(
                    $weather->id,
                    $weather->main,
                    $weather->description,
                    $weather->icon
                );
            },
            $weather
        );
    }
}
