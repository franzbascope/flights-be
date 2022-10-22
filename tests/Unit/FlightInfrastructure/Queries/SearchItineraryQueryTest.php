<?php

namespace Tests\Unit\FlightInfrastructure\Queries;

use App\FlightsInfrastructure\Queries\Itinerary\SearchItineraryQuery;
use Illuminate\Database\Eloquent\Builder;
use Tests\TestCase;


class SearchItineraryQueryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_valid_query()
    {
        $searchFlightProgram = new SearchItineraryQuery();
        $query = $searchFlightProgram->getQuery([]);
        $this->assertInstanceOf(Builder::class, $query,);
    }
}
