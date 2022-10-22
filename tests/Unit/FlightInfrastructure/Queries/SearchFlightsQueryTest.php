<?php

namespace Tests\Unit\FlightInfrastructure\Queries;

use App\FlightsInfrastructure\Queries\Fligth\SearchFlightsQuery;
use Illuminate\Database\Eloquent\Builder;
use Tests\TestCase;

class SearchFlightsQueryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_query_valid()
    {
        $mock = \Mockery::mock(\Illuminate\Http\Request::class)->makePartial();
        $mock->shouldReceive('all')
            ->andReturn([]);

        $searchFlightProgram = new SearchFlightsQuery($mock);
        $query = $searchFlightProgram->getQuery();
        $this->assertInstanceOf(Builder::class, $query,);
    }
}
