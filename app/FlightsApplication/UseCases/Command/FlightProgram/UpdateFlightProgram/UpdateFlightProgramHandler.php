<?php

namespace App\FlightsApplication\UseCases\Command\FlightProgram\UpdateFlightProgram;

use App\FlightsDomain\Repository\IFlightProgramRepository;

class UpdateFlightProgramHandler
{
    private IFlightProgramRepository $flightProgramRepository;

    /**
     * @param IFlightProgramRepository $flightProgramRepository
     */
    public function __construct(IFlightProgramRepository $flightProgramRepository)
    {
        $this->flightProgramRepository = $flightProgramRepository;
    }


    public function __invoke(UpdateFlightProgramCommand $command)
    {
        return $this->flightProgramRepository->update($command->getData(), $command->getId());
    }
}
