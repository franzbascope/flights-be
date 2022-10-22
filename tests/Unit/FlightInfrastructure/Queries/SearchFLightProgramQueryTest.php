<?php

namespace Tests\Unit\FlightInfrastructure\Queries;

use App\FlightsApplication\UseCases\Command\FlightProgram\QueryFlightPrograms\QueryFlightProgramCommand;
use App\FlightsInfrastructure\Queries\FlightProgram\SearchFlightProgramQuery;
use Illuminate\Database\Eloquent\Builder;
use Tests\TestCase;

class SearchFLightProgramQueryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_query_valid()
    {
        $mockCommand = new QueryFlightProgramCommand("VVI","LPB",true,1);
        $searchFlightProgram = new SearchFlightProgramQuery($mockCommand);
        $query = $searchFlightProgram->getQuery();
        $this->assertInstanceOf(Builder::class, $query,);
    }
}
