<?php

namespace App\FlightsApplication\UseCases\Command\FlightProgram\QueryFlightPrograms;

use App\FlightsDomain\Repository\IFlightProgramRepository;
use App\FlightsInfrastructure\Queries\FlightProgram\SearchFlightProgramQuery;

class QueryFlightProgramHandler
{
    private IFlightProgramRepository $flightProgramRepository;

    /**
     * @param IFlightProgramRepository $flightProgramRepository
     */
    public function __construct(IFlightProgramRepository $flightProgramRepository)
    {
        $this->flightProgramRepository = $flightProgramRepository;
    }


    public function __invoke(QueryFlightProgramCommand $command)
    {
        $searchFlightProgramsQuery = new SearchFlightProgramQuery($command);
        return $this->flightProgramRepository->query($searchFlightProgramsQuery->getQuery());
    }
}
