<?php

namespace App\FlightsInfrastructure\Repository;

use App\FlightsDomain\Model\EntityFlight;
use App\FlightsDomain\Repository\IFlightRepository;
use App\Models\Flight;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ItemNotFoundException;

class FlightRepository implements IFlightRepository
{
    public function create(EntityFlight $flight)
    {
        $dbFlight = new Flight();
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

    public function getById(int $id): ?Model
    {
        return Flight::find($id);
    }

    public function update(EntityFlight $flight, int $flightId)
    {
        $flight = Flight::find($flightId);
        $flight->fill($flight);
        $flight->save();
    }

    public function query(Builder $query = null)
    {
        if ($query) {
            return $query->get();
        }
        return Flight::query()->get();
    }

    public function delete(int $id): Model
    {
        $flight = $this->getById($id);
        if (!$flight) {
            throw new ItemNotFoundException("Flight with id: $id could not be found");
        }
        $flight->delete();
        return $flight;
    }
}
