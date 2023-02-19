<?php
return [
    'api_key' => env('OPENWAETHER_API_KEY', ''),
    'onecall_api_version' => '2.5',
    'historical_api_version' => '2.5',
    'forecast_api_version' => '2.5',
    'polution_api_version' => '2.5',
    'weather_api_version' => '2.5',
    'geo_api_version' => '1.0',
    'lang' => env('OPENWAETHER_API_LANG', 'en'),
    'date_format' => 'Y-m-d',
    'time_format' => 'h:i:s',
    'day_format' => 'l',
    'temp_format' => 'c'// c for celcius, f for farenheit, k for kelvin
];
