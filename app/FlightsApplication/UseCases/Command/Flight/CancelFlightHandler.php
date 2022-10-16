<?php

namespace App\FlightsApplication\UseCases\Command\Flight;

use App\FlightsDomain\Model\DomainEvent;
use App\FlightsDomain\Repository\IFlightRepository;
use App\FlightsDomain\Repository\IUnitOfWork;
use Illuminate\Support\Facades\Log;

class CancelFlightHandler
{
    private IFlightRepository $flightRepository;
    private IUnitOfWork $unitOfWork;

    /**
     * @param IFlightRepository $flightRepository
     * @param IUnitOfWork $unitOfWork
     */
    public function __construct(IFlightRepository $flightRepository, IUnitOfWork $unitOfWork)
    {
        $this->flightRepository = $flightRepository;
        $this->unitOfWork = $unitOfWork;
    }

    private function getCancelFlightEvent($flightId): DomainEvent
    {
        $flight = $this->flightRepository->getById($flightId);
        return new DomainEvent(new \DateTime(), $flight->toArray(), "flightCanceled");
    }

    /**
     * @throws \Exception
     */
    public function __invoke(CancelFlightCommand $command)
    {
        try {
            $this->unitOfWork->beginTransaction();
            $itinerary = $this->flightRepository->getById($command->flightId);
            $itinerary->status = $command->getStatus();
            $itinerary->save();
            $this->unitOfWork->addDomainEvent($this->getCancelFlightEvent($itinerary->id));
            $this->unitOfWork->commit();
            return $itinerary;
        } catch (\Exception $ex) {
            $this->unitOfWork->rollBack();
            Log::error("Not able to create flight", $ex->getTrace());
            throw $ex;
        }
    }
}
