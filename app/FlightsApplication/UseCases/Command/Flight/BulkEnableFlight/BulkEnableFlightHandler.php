<?php

namespace App\FlightsApplication\UseCases\Command\Flight\BulkEnableFlight;

use App\FlightsDomain\Model\DomainEvent;
use App\FlightsDomain\Repository\IFlightRepository;
use App\FlightsDomain\Repository\IUnitOfWork;
use App\FlightsInfrastructure\Events\FlightCreatedEvent;
use App\Models\Flight;

class BulkEnableFlightHandler
{
    private IUnitOfWork $unitOfWork;
    private IFlightRepository $flightRepository;

    /**
     * @param IUnitOfWork $unitOfWork
     * @param IFlightRepository $flightRepository
     */
    public function __construct(IUnitOfWork $unitOfWork, IFlightRepository $flightRepository)
    {
        $this->unitOfWork = $unitOfWork;
        $this->flightRepository = $flightRepository;
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


    public function __invoke(BulkEnableFlightCommand $command)
    {
        try {
            $this->unitOfWork->beginTransaction();
            $response = [];
            foreach ($command->getData() as $data) {
                $id = $data["id"];
                unset($data["id"]);
                $response[] = $this->flightRepository->update($data,$id);
                $this->unitOfWork->addDomainEvent($this->getCreatedFlightEvent($id));
            }
            $this->unitOfWork->commit();
            return $response;

        } catch (\Exception $ex) {
            $this->unitOfWork->rollBack();
            throw $ex;
        }


    }

}
