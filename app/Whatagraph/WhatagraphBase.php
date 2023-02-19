<?php

namespace App\Whatagraph;

use App\Whatagraph\DTO\Data;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

abstract class WhatagraphBase
{
    private string $key;
    private const URL = 'https://api.whatagraph.com/v1/integration-source-data/';

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * @throws \JsonException
     */
    protected function sendPost(Data $data): PromiseInterface|Response
    {
        var_dump($this->prepareBeforeSend($data));
        return Http::withToken($this->key)
            ->withBody($this->prepareBeforeSend($data))
            ->accept('application/json')
            ->post(
            self::URL
        );
    }

    private function prepareBeforeSend(Data $data): string
    {
        return json_encode($data, JSON_THROW_ON_ERROR);
    }
}
