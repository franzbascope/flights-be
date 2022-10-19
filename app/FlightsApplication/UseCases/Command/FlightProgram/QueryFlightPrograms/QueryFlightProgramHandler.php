<?php

namespace App\FlightsApplication\UseCases\Command\FlightProgram\QueryFlightPrograms;

use App\FlightsDomain\Repository\IFlightProgramRepository;

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
        return $this->flightProgramRepository->query(null);
    }
}
