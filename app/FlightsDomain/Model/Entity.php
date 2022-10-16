<?php

namespace App\FlightsDomain\Model;

use Illuminate\Support\Str;

class Entity
{
    private string $uuid;

    public function __construct()
    {
        $this->uuid = Str::uuid();
    }

    /**
     * @return \Ramsey\Uuid\UuidInterface|string
     */
    public function getUuid(): \Ramsey\Uuid\UuidInterface|string
    {
        return $this->uuid;
    }
}
