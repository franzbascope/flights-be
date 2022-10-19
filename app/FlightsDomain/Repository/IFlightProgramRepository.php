<?php

namespace App\FlightsDomain\Repository;

use App\FlightsDomain\Model\EntityFlightProgram;
use Illuminate\Database\Eloquent\Builder;

interface IFlightProgramRepository
{
    public function create(EntityFlightProgram $itinerary);

    public function getById(int $id);

    public function query(Builder $query = null);
}
