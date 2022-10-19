<?php

namespace App\FlightsInfrastructure\Repository;

use App\FlightsDomain\Model\EntityFlight;
use App\FlightsDomain\Repository\IFlightRepository;

class FlightRepository implements IFlightRepository
{
    public function create(EntityFlight $flight)
    {
        $dbFlight = new \App\Models\Flight();
        $dbFlight->information = $flight->getInformation();
        $dbFlight->flightProgramId = $flight->getFlightProgramId();
        $dbFlight->aircraftUuid = $flight->getAircraftUuid();
        $dbFlight->crewUuid = $flight->getCrewUuid();
        $dbFlight->startTime = $flight->getStartTime();
        $dbFlight->endTime = $flight->getEndTime();
        $dbFlight->status = "active";
        $dbFlight->uuid = $flight->getUuid();
        $dbFlight->save();
        return $this->getById($dbFlight->id);
    }

    public function getById(int $id)
    {
        return \App\Models\Flight::find($id);
    }

    public function update(EntityFlight $flight, int $flightId)
    {
        $flight = \App\Models\Flight::find($flightId);
        $flight->fill($flight);
        $flight->save();
    }

    public function query($query)
    {
        return \App\Models\Flight::query()->get();
    }
}
