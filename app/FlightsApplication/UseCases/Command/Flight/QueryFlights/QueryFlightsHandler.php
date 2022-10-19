<?php

namespace App\FlightsApplication\UseCases\Command\Flight\QueryFlights;

use App\FlightsDomain\Repository\IFlightProgramRepository;
use App\FlightsDomain\Repository\IFlightRepository;
use App\FlightsInfrastructure\Queries\Fligth\SearchFlightsQuery;

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
        $query = (new SearchFlightsQuery($command->request))->getQuery();
        return $this->flightRepository->query($query);
    }
}
