<?php

namespace App\FlightsInfrastructure\Repository;

use App\FlightsDomain\Model\Flight;
use App\FlightsDomain\Repository\IFlightRepository;

class FlightRepository implements IFlightRepository
{
    public function create(Flight $flight)
    {
        $dbFlight = new \App\Models\Flight();
        $dbFlight->information = $flight->getInformation();
        $dbFlight->flightProgramId = $flight->getFlightProgramId();
        $dbFlight->aircraftUuid = $flight->getAircraftUuid();
        $dbFlight->crewUuid = $flight->getCrewUuid();
        $dbFlight->startTime = $flight->getStartTime();
        $dbFlight->endTime = $flight->getEndTime();
        $dbFlight->status = "active";
        $dbFlight->save();
        return $this->getById($dbFlight->id);
    }

    public function getById(int $id)
    {
        return \App\Models\Flight::find($id);
    }

    public function update(Flight $flight, int $flightId)
    {
        $flight = \App\Models\Flight::find($flightId);
        $flight->fill($flight);
        $flight->save();
    }
}
