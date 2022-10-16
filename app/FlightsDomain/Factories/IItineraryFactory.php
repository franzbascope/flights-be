<?php

namespace App\FlightsDomain\Factories;

use App\FlightsDomain\Model\Itinerary;

interface IItineraryFactory
{
    public function create(string $sourceAirport, string $destinyAirport): Itinerary;
}
