<?php

namespace App\FlightsApplication\UseCases\Command\Flight\QueryFlights;

use App\FlightsDomain\Repository\IFlightProgramRepository;
use App\FlightsDomain\Repository\IFlightRepository;

class QueryFlightsHandler
{
    private IFlightRepository $flightRepository;

    /**
     * @param IFlightRepository $flightRepository
     */
    public function __construct(IFlightRepository $flightRepository)
    {
        $this->flightRepository = $flightRepository;
    }


    public function __invoke(QueryFlightsCommand $command)
    {
        return $this->flightRepository->query(null);
    }
}
