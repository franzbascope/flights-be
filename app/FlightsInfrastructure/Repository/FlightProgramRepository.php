<?php

namespace App\FlightsInfrastructure\Repository;

use App\FlightsDomain\Model\EntityFlightProgram;
use App\FlightsDomain\Repository\IFlightProgramRepository;
use App\Models\FlightProgram;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ItemNotFoundException;

class FlightProgramRepository implements IFlightProgramRepository
{
    public function create(EntityFlightProgram $flightProgram)
    {
        $dbFlightProgram = new FlightProgram();
        $dbFlightProgram->sourceAirport =  $flightProgram->getSourceAirport();
        $dbFlightProgram->destinyAirport =  $flightProgram->getDestinyAirport();
        $dbFlightProgram->itinerary_id = $flightProgram->getItineraryId();
        $dbFlightProgram->uuid = $flightProgram->getUuid();
        $dbFlightProgram->flightCode = $flightProgram->getFlightCode();
        $dbFlightProgram->save();
        return $dbFlightProgram;
    }

    public function getById(int $id): Model|null
    {
        return FlightProgram::find($id);
    }

    public function query($query = null)
    {
        if ($query) {
            return $query->get();
        }
        return FlightProgram::query()->with(["flights"])->get();
    }

    public function update(array $data, int $id)
    {
        $flightProgram = $this->getById($id);
        $flightProgram->fill($data);
        $flightProgram->save();
        return $flightProgram;
    }

    public function delete(int $flightProgramId)
    {
        $flightProgram = $this->getById($flightProgramId);
        if ($flightProgram == null) {
            throw new ItemNotFoundException("Flight program with id: {$flightProgramId} was not found");
        }
        $flightProgram->delete();
        return $flightProgram;
    }
}
