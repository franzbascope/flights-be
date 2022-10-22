<?php

namespace Tests\Unit\FlightInfrastructure\Repository;

use App\FlightsDomain\Factories\FlightProgramFactory;
use App\FlightsInfrastructure\Repository\FlightProgramRepository;
use App\Models\FlightProgram;
use Illuminate\Support\Facades\Cache;
use Mockery;
use Tests\TestCase;


class FlightProgramRepositoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
//    public function test_create_flight_program()
//    {
//        $flightProgram = (new FlightProgramFactory())->create("VVI", "LPB", 1, "test");
//
//        $mock = Mockery::mock(FlightProgram::class)->makePartial();
//
//        $mock->shouldReceive('save')->andReturn([]);
//
//        $this->app->instance(FlightProgram::class, $mock);
//
//        $repository = new FlightProgramRepository();
//        $repository->create($flightProgram);
//    }
//
//    public function test_by_id(){
//        $mock = Mockery::mock(FlightProgram::class)->makePartial();
//        $mock->shouldReceive('find')->with(1);
//        $this->app->instance(FlightProgram::class, $mock);
//        $repository = new FlightProgramRepository();
//        $repository->getById(1);
//
//    }
}
