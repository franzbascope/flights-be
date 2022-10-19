<?php

namespace App\FlightsDomain\Repository;

use App\FlightsDomain\Model\FlightProgram;

interface IFlightProgramRepository
{
    public function create(FlightProgram $itinerary);

    public function getById(int $id);

    public function query($query = null);
}
