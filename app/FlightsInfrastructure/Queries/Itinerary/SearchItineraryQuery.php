<?php

namespace App\FlightsInfrastructure\Queries\Itinerary;

use App\FlightsDomain\Repository\IQuery;
use App\FlightsInfrastructure\Queries\MainQuery;
use App\Models\Itinerary;
use Illuminate\Database\Eloquent\Builder;

class SearchItineraryQuery extends MainQuery implements IQuery
{
    public function getQuery(array $data): Builder
    {
        $properties = ["sourceAirport","destinyAirport"];
        $query = Itinerary::query();
        return $this->buildQueryFromRequest($query, $properties, $data);
    }
}
