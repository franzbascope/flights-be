<?php

namespace App\FlightsInfrastructure\Repository;

use App\FlightsDomain\Model\EntityItinerary;
use App\FlightsDomain\Repository\IItineraryRepository;

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

    public function getById(int $id)
    {
        return \App\Models\Itinerary::find($id);
    }
}
