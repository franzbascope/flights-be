<?php

namespace App\FlightsDomain\Repository;

use Illuminate\Database\Eloquent\Builder;

interface IQuery
{
    public function getQuery(array $data): Builder;
}
