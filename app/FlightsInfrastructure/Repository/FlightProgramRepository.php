<?php

namespace App\FlightsInfrastructure\Repository;

use App\FlightsDomain\Model\FlightProgram;
use App\FlightsDomain\Repository\IFlightProgramRepository;

class FlightProgramRepository implements IFlightProgramRepository
{
    public function create(FlightProgram $flightProgram)
    {
        $dbFlightProgram = new \App\Models\FlightProgram();
        $dbFlightProgram->sourceAirport =  $flightProgram->getSourceAirport();
        $dbFlightProgram->destinyAirport =  $flightProgram->getDestinyAirport();
        $dbFlightProgram->itinerary_id = $flightProgram->getItineraryId();
        $dbFlightProgram->uuid = $flightProgram->getUuid();
        $dbFlightProgram->save();
        return $dbFlightProgram;
    }

    public function getById(int $id)
    {
        return \App\Models\FlightProgram::find($id);
    }
}
