<?php

namespace App\FlightsInfrastructure\Repository;

use App\FlightsDomain\Model\EntityItinerary;
use App\FlightsDomain\Repository\IItineraryRepository;
use App\Models\Itinerary;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ItemNotFoundException;

class ItineraryRepository implements IItineraryRepository
{
    public function create(EntityItinerary $itinerary)
    {
        $dbItinerary = new \App\Models\Itinerary();
        $dbItinerary->uuid = $itinerary->getUuid();
        $dbItinerary->sourceAirport = $itinerary->getSourceAirport();
        $dbItinerary->destinyAirport = $itinerary->getDestinyAirport();
        $dbItinerary->save();
        return $dbItinerary;
    }

    public function getById(int $id): ?Model
    {
        return \App\Models\Itinerary::find($id);
    }

    public function query(?Builder $query)
    {
        if ($query) {
            return $query->get();
        }
        return Itinerary::all();
    }

    public function delete(int $itineraryId)
    {
        $itinerary = $this->getById($itineraryId);
        if (!$itinerary) {
            $this->handleNotFound($itineraryId);
        }
        $itinerary->delete();
        return $itinerary;
    }

    private function handleNotFound(
        int $id
    )
    {
        throw new ItemNotFoundException("Itinerary with Id: $id could not be found");
    }

    public function update(array $data, int $id)
    {
        $itinerary = $this->getById($id);
        if (!$itinerary) {
            $this->handleNotFound($id);
        }
        $itinerary->fill($data);
        $itinerary->save();
        return $itinerary;
    }
}
