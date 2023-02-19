<?php

namespace App\Whatagraph\DTO;

class Data implements \JsonSerializable
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function jsonSerialize(): array
    {
        return [
            'data' => $this->data,
        ];
    }
}
