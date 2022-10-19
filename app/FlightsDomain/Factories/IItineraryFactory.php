<?php

namespace App\FlightsDomain\Factories;

use App\FlightsDomain\Model\EntityItinerary;

interface IItineraryFactory
{
    public function create(string $sourceAirport, string $destinyAirport): EntityItinerary;
}
