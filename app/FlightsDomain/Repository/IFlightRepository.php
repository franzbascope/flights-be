<?php

namespace App\FlightsDomain\Repository;

use App\FlightsDomain\Model\Flight;

interface IFlightRepository
{
    public function create(Flight $flight);

    public function update(Flight $flight, int $flightId);

    public function getById(int $id);
}
