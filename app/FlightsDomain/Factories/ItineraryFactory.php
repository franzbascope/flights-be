<?php

namespace App\FlightsDomain\Factories;

use App\FlightsDomain\Model\Itinerary;
use App\FlightsDomain\ValueObjects\AirportCode;

class ItineraryFactory implements IItineraryFactory
{
    public function create(string $sourceAirport, string $destinyAirport): Itinerary
    {
        $sourceAirportCode = new AirportCode($sourceAirport);
        $destinyAirportCode = new AirportCode($destinyAirport);
        return new Itinerary($sourceAirportCode, $destinyAirportCode);
    }
}
