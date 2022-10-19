<?php

namespace App\FlightsDomain\Repository;

use App\FlightsDomain\Model\EntityFlight;

interface IFlightRepository
{
    public function create(EntityFlight $flight);

    public function update(EntityFlight $flight, int $flightId);

    public function getById(int $id);

    public function query($query);
}
