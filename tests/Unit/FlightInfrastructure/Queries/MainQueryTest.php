<?php

namespace Tests\Unit\FlightInfrastructure\Queries;

use App\FlightsInfrastructure\Queries\MainQuery;
use App\Models\FlightProgram;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class MainQueryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_maquin_query()
    {
        $mainQuery = new MainQuery();
        $query = FlightProgram::query();
        $properties = ["name"];
        $data = [
          "name" => "TestName"
        ];
        $result = $mainQuery->buildQueryFromRequest($query,$properties,$data);
        $this->assertInstanceOf(Builder::class, $result);
    }
}
