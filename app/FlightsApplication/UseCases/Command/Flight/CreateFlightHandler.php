<?php

namespace App\FlightsApplication\UseCases\Command\Flight;

use App\FlightsDomain\Factories\FlightFactory;
use App\FlightsDomain\Model\DomainEvent;
use App\FlightsDomain\Repository\IFlightRepository;
use App\FlightsDomain\Repository\IUnitOfWork;
use Illuminate\Support\Facades\Log;

class CreateFlightHandler
{
    private IFlightRepository $flightRepository;
    private IUnitOfWork $unitOfWork;
    private FlightFactory $flightFactory;

    /**
     * @param IFlightRepository $flightRepository
     * @param IUnitOfWork $unitOfWork
     * @param FlightFactory $flightFactory
     */
    public function __construct(IFlightRepository $flightRepository, IUnitOfWork $unitOfWork, FlightFactory $flightFactory)
    {
        $this->flightRepository = $flightRepository;
        $this->unitOfWork = $unitOfWork;
        $this->flightFactory = $flightFactory;
    }

    private function getCreatedFlightEvent($flightId): DomainEvent
    {
        $flight = $this->flightRepository->getById($flightId);
        return new DomainEvent(new \DateTime(), $flight->toArray(), "flightCreated");
    }


    /**
     * @throws \Exception
     */
    public function __invoke(CreateFlightCommand $command)
    {
        try {
            $flight = $this->flightFactory->create($command->getRequest());
            $this->unitOfWork->beginTransaction();
            $savedItinerary = $this->flightRepository->create($flight);
            $this->unitOfWork->addDomainEvent($this->getCreatedFlightEvent($savedItinerary->id));
            $this->unitOfWork->commit();
            return $savedItinerary;
        } catch (\Exception $ex) {
            $this->unitOfWork->rollBack();
            Log::error("Not able to create flight", $ex->getTrace());
            throw $ex;
        }
    }
}
