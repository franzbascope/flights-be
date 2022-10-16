<?php

namespace App\FlightsDomain\Factories;

use App\FlightsDomain\Model\FlightProgram;

interface IFlightProgramFactory
{
    public function create(string $sourceAirport, string $destinyAirport, int $itineraryId): FlightProgram;
}
