<?php

namespace App\FlightsDomain\Repository;

use App\FlightsDomain\Model\EntityFlightProgram;

interface IFlightProgramRepository
{
    public function create(EntityFlightProgram $itinerary);

    public function getById(int $id);

    public function query($query = null);
}
