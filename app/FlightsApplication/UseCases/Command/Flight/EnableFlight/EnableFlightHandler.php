<?php

namespace App\FlightsApplication\UseCases\Command\Flight\EnableFlight;

use App\FlightsDomain\Model\DomainEvent;
use App\FlightsDomain\Repository\IFlightRepository;
use App\FlightsDomain\Repository\IUnitOfWork;
use App\FlightsInfrastructure\Events\FlightCreatedEvent;

class EnableFlightHandler
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

    private function getCreatedFlightEvent($flightId): DomainEvent
    {
        $flight = $this->flightRepository->getById($flightId);
        $flightProgram = $flight->flightProgram;
        $data = [
            "flight_program" => $flightProgram,
            "flight" => $flight
        ];
        return new FlightCreatedEvent($data);
    }


    public function __invoke(EnableFlightCommand $command)
    {
        try {
            $this->unitOfWork->beginTransaction();
            $flight = $this->flightRepository->update($command->getData(), $command->getFlightId());
            $this->unitOfWork->addDomainEvent($this->getCreatedFlightEvent($flight->id));
            $this->unitOfWork->commit();
        } catch (\Exception $ex) {
            $this->unitOfWork->rollBack();
            throw $ex;
        }

    }


}
