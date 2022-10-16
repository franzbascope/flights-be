<?php

namespace App\FlightsDomain\Repository;

use App\FlightsDomain\Model\DomainEvent;

interface IUnitOfWork
{
    public function beginTransaction();
    public function commit();
    public function rollBack();
    public function addDomainEvent(DomainEvent $domainEvent);
}
