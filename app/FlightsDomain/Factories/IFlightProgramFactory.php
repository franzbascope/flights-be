<?php

namespace App\FlightsDomain\Factories;

use App\FlightsDomain\Model\EntityFlightProgram;

interface IFlightProgramFactory
{
    public function create(string $sourceAirport, string $destinyAirport, int $itineraryId, string $flightCode): EntityFlightProgram;
}
