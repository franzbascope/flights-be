<?php

namespace App\FlightsDomain\Repository;

use App\FlightsDomain\Model\EntityFlight;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface IFlightRepository
{
    public function create(EntityFlight $flight);

    public function update(EntityFlight $flight, int $flightId);

    public function getById(int $id): ?Model;

    public function query(Builder $query);

    public function delete(int $id): Model;
}
