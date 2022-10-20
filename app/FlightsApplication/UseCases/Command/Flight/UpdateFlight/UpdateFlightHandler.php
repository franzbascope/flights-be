<?php

namespace App\FlightsApplication\UseCases\Command\Flight\UpdateFlight;

use App\FlightsDomain\Repository\IFlightRepository;

class UpdateFlightHandler
{
    private IFlightRepository $flightRepository;

    /**
     * @param IFlightRepository $flightRepository
     */
    public function __construct(IFlightRepository $flightRepository)
    {
        $this->flightRepository = $flightRepository;
    }

    public function __invoke(UpdateFlightCommand $command)
    {
        return $this->flightRepository->update($command->getData(), $command->getFlightId());
    }
}
