<?php

namespace App\FlightsInfrastructure\Repository;

use App\FlightsDomain\Model\EntityFlightProgram;
use App\FlightsDomain\Repository\IFlightProgramRepository;
use App\Models\FlightProgram;

class FlightProgramRepository implements IFlightProgramRepository
{
    public function create(EntityFlightProgram $flightProgram)
    {
        $dbFlightProgram = new FlightProgram();
        $dbFlightProgram->sourceAirport =  $flightProgram->getSourceAirport();
        $dbFlightProgram->destinyAirport =  $flightProgram->getDestinyAirport();
        $dbFlightProgram->itinerary_id = $flightProgram->getItineraryId();
        $dbFlightProgram->uuid = $flightProgram->getUuid();
        $dbFlightProgram->save();
        return $dbFlightProgram;
    }

    public function getById(int $id)
    {
        return FlightProgram::find($id);
    }

    public function query($query = null)
    {
        if($query){
            return $query->get();
        }
        return FlightProgram::query()->with(["flights"])->get();
    }
}
