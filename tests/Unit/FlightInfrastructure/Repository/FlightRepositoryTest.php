<?php

namespace Tests\Unit\FlightInfrastructure\Repository;

use App\FlightsDomain\Factories\FlightFactory;
use App\FlightsDomain\Factories\FlightProgramFactory;
use App\FlightsDomain\Model\EntityFlight;
use App\FlightsInfrastructure\Repository\FlightProgramRepository;
use App\FlightsInfrastructure\Repository\FlightRepository;
use App\Models\Flight;
use App\Models\FlightProgram;
use Mockery;
use Tests\TestCase;

class FlightRepositoryTest extends TestCase
{
    public function test_create_flight_flight()
    {

        // entity
        $mock = Mockery::mock(EntityFlight::class)->makePartial();
        $mock->shouldReceive("getInformation");
        $mock->shouldReceive("getFlightProgramId");
        $mock->shouldReceive("getAircraftUuid");
        $mock->shouldReceive("getCrewUuid");
        $mock->shouldReceive("getStartTime");
        $mock->shouldReceive("getEndTime");
        $mock->shouldReceive("getUuid");


        // normal
        $this->expectException(\Exception::class);
        $mockFlight = Mockery::mock(Flight::class)->makePartial();

        $mockFlight->shouldReceive('save')->andReturn([]);
        $mockFlight->shouldReceive('Mockery_4_DateTime::format')->andReturn([]);

        $this->app->instance(Flight::class, $mockFlight);
        (new FlightRepository())->create($mock);
    }

}
