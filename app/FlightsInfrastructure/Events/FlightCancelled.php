<?php

namespace App\FlightsInfrastructure\Events;

use App\FlightsDomain\Model\DomainEvent;

class FlightCancelled extends DomainEvent
{

    public function __construct(array $data)
    {
        $created_at = new \DateTime();
        $name = "FlightCancelled";
        $topic = "arn:aws:sns:us-east-1:191300708619:VueloCancelado";
        parent::__construct($created_at,$data,$name, $topic);
    }

}
