<?php

namespace App\FlightsApplication\UseCases\Command\FlightProgram\CreateFlightProgram;

use App\FlightsDomain\Factories\IFlightProgramFactory;
use App\FlightsDomain\Repository\IFlightProgramRepository;
use App\FlightsDomain\Repository\IUnitOfWork;
use Illuminate\Support\Facades\Log;

class CreateFlightProgramHandler
{
    private IFlightProgramRepository $flightProgramRepository;
    private IUnitOfWork $unitOfWork;
    private IFlightProgramFactory $flightProgramFactory;

    /**
     * @param IFlightProgramRepository $flightProgramRepository
     * @param IUnitOfWork $unitOfWork
     * @param IFlightProgramFactory $flightProgramFactory
     */
    public function __construct(IFlightProgramRepository $flightProgramRepository, IUnitOfWork $unitOfWork, IFlightProgramFactory $flightProgramFactory)
    {
        $this->flightProgramRepository = $flightProgramRepository;
        $this->unitOfWork = $unitOfWork;
        $this->flightProgramFactory = $flightProgramFactory;
    }

    /**
     * @throws \Exception
     */
    public function __invoke(CreateFlightProgramCommand $command)
    {
        try {
            $flightProgram = $this->flightProgramFactory->create($command->getSourceAirport(), $command->getDestinyAirport(), $command->getItineraryId());
            $this->unitOfWork->beginTransaction();
            $savedItinerary = $this->flightProgramRepository->create($flightProgram);
            $this->unitOfWork->commit();
            return $savedItinerary;
        } catch (\Exception $ex) {
            $this->unitOfWork->rollBack();
            Log::error("Not able to create itinerary", $ex->getTrace());
            throw $ex;
        }
    }
}
