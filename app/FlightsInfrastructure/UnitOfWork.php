<?php

namespace App\FlightsInfrastructure;

use App\FlightsDomain\Model\DomainEvent;
use App\FlightsDomain\Model\Entity;
use App\FlightsDomain\Repository\IEventPublisher;
use App\FlightsDomain\Repository\IUnitOfWork;
use Illuminate\Support\Facades\DB;

class UnitOfWork implements IUnitOfWork
{
    private array $domainEvents = [];
    private IEventPublisher $eventPublisher;

    /**
     * @param Entity $entity
     * @param IEventPublisher $eventPublisher
     */
    public function __construct(IEventPublisher $eventPublisher)
    {
        $this->eventPublisher = $eventPublisher;
    }


    public function beginTransaction()
    {
        DB::beginTransaction();
    }

    public function commit()
    {
        $this->publishDomainEvents();
        DB::commit();
        $this->clearDomainEvents();
        ;
    }

    private function publishDomainEvents()
    {
        foreach ($this->domainEvents as $event) {
            $this->eventPublisher->publish($event);
        }
    }

    public function addDomainEvent(DomainEvent $domainEvent): void
    {
        $this->domainEvents[] = $domainEvent;
    }

    private function clearDomainEvents(): void
    {
        $this->domainEvents = [];
    }

    public function rollBack()
    {
        DB::rollBack();
    }
}
