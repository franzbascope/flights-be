<?php

namespace App\FlightsDomain\Model;

use Illuminate\Support\Str;

class DomainEvent
{
    public \DateTime $created_at;
    public string $uuid;
    public array $data;
    public string $name;
    public string $topic;

    /**
     * @param \DateTime $created_at
     * @param array $data
     * @param string $name
     */
    public function __construct(\DateTime $created_at, array $data, string $name,string $topic)
    {
        $this->created_at = $created_at;
        $this->uuid = Str::uuid();
        $this->data = $data;
        $this->name = $name;
        $this->topic = $topic;
    }
}
