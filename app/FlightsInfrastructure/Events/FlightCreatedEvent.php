<?php

namespace App\FlightsInfrastructure\Events;

use App\FlightsDomain\Model\DomainEvent;

class FlightCreatedEvent extends DomainEvent
{
    public function __construct(array $data)
    {
        $created_at = new \DateTime();
        $name = "FlightCreated";
        $topic = "arn:aws:sns:us-east-1:191300708619:VueloCreado";
        parent::__construct($created_at,$data,$name, $topic);
    }
}
