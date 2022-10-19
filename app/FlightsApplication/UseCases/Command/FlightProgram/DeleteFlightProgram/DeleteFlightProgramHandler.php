<?php

namespace App\FlightsApplication\UseCases\Command\FlightProgram\DeleteFlightProgram;

use App\FlightsDomain\Repository\IFlightProgramRepository;

class DeleteFlightProgramHandler
{
    private IFlightProgramRepository $flightProgramRepository;

    /**
     * @param IFlightProgramRepository $flightProgramRepository
     */
    public function __construct(IFlightProgramRepository $flightProgramRepository)
    {
        $this->flightProgramRepository = $flightProgramRepository;
    }


    public function __invoke(DeleteFlightProgramCommand $command)
    {
        return $this->flightProgramRepository->delete($command->getFlightProgramId());
    }

}
