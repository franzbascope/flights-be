<?php

namespace App\FlightsDomain\Factories;

use App\FlightsDomain\Model\EntityItinerary;
use App\FlightsDomain\ValueObjects\AirportCode;

class ItineraryFactory implements IItineraryFactory
{
    public function create(string $sourceAirport, string $destinyAirport): EntityItinerary
    {
        $sourceAirportCode = new AirportCode($sourceAirport);
        $destinyAirportCode = new AirportCode($destinyAirport);
        return new EntityItinerary($sourceAirportCode, $destinyAirportCode);
    }
}
