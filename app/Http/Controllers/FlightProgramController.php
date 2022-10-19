<?php

namespace App\Http\Controllers;

use App\FlightsApplication\UseCases\Command\CommandBus;
use App\FlightsApplication\UseCases\Command\FlightProgram\CreateFlightProgram\CreateFlightProgramCommand;
use App\FlightsApplication\UseCases\Command\FlightProgram\QueryFlightPrograms\QueryFlightProgramCommand;
use Illuminate\Http\Request;

class FlightProgramController extends Controller
{
    public function __construct(private CommandBus $commandBus)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sourceAirport = $request->get("sourceAirport");
        $destinyAirport = $request->get("destinyAirport");
        $itineraryId = $request->get("itineraryId");

        $command = new CreateFlightProgramCommand($sourceAirport, $destinyAirport, $itineraryId);
        $itinerary = $this->commandBus->handle($command);
        return response($itinerary);
    }

    public function index(Request $request)
    {
        $sourceAirportCode = $request->get("sourceAirport");
        $destinyAirportCode = $request->get("destinyAirport");
        $includeFlights = $request->get("includeFlights");
        $command = new QueryFlightProgramCommand($sourceAirportCode, $destinyAirportCode, $includeFlights);
        $data = $this->commandBus->handle($command);
        return response($data);
    }
}
