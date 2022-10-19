<?php

namespace App\FlightsApplication\UseCases\Command\Flight\DeleteFlight;

use App\FlightsDomain\Repository\IFlightRepository;

class DeleteFlightHandler
{
    private IFlightRepository $flightRepository;

    /**
     * @param IFlightRepository $flightRepository
     */
    public function __construct(IFlightRepository $flightRepository)
    {
        $this->flightRepository = $flightRepository;
    }


    public function __invoke(DeleteFlightCommand $command)
    {
        return $this->flightRepository->delete($command->getFlightId());
    }
}
