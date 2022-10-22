<?php

namespace App\FlightsInfrastructure\Queries\Fligth;

use App\FlightsInfrastructure\Queries\MainQuery;
use App\Models\Flight;
use Illuminate\Http\Request;

class SearchFlightsQuery extends MainQuery
{
    private Request $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getQuery()
    {
        $query =  Flight::query();
        $properties = ["startTime","endTime","startDate","endDate","status","flightProgramId","id"];
        $query = $this->buildQueryFromRequest($query, $properties, $this->request->all());
        $query->with("flightProgram");
        return $query;
    }
}
