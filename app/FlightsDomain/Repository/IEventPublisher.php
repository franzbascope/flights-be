<?php

namespace App\FlightsDomain\Repository;

use App\FlightsDomain\Model\DomainEvent;

interface IEventPublisher
{
    public function publish(DomainEvent $event);
}
