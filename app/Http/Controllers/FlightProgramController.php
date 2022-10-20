<?php

namespace App\Http\Controllers;

use App\FlightsApplication\UseCases\Command\CommandBus;
use App\FlightsApplication\UseCases\Command\FlightProgram\CreateFlightProgram\CreateFlightProgramCommand;
use App\FlightsApplication\UseCases\Command\FlightProgram\DeleteFlightProgram\DeleteFlightProgramCommand;
use App\FlightsApplication\UseCases\Command\FlightProgram\QueryFlightPrograms\QueryFlightProgramCommand;
use App\FlightsApplication\UseCases\Command\FlightProgram\UpdateFlightProgram\UpdateFlightProgramCommand;
use Illuminate\Http\Request;

class FlightProgramController extends Controller
{
    public function __construct(private CommandBus $commandBus)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sourceAirport = $request->get("sourceAirport");
        $destinyAirport = $request->get("destinyAirport");
        $itineraryId = $request->get("itineraryId");
        $flightCode = $request->get("flightCode");

        $command = new CreateFlightProgramCommand($sourceAirport, $destinyAirport, $itineraryId,$flightCode);
        $itinerary = $this->commandBus->handle($command);
        return response($itinerary);
    }

    public function index(Request $request)
    {
        $sourceAirportCode = $request->get("sourceAirport") ?? "";
        $destinyAirportCode = $request->get("destinyAirport") ?? "";
        $includeFlights = $request->get("includeFlights") ?? false;
        $flightProgramId =  $request->get("flightProgramId") ;
        $flightProgramId = $flightProgramId ? intval($flightProgramId) : null;
        $command = new QueryFlightProgramCommand($sourceAirportCode, $destinyAirportCode, $includeFlights, $flightProgramId);
        $data = $this->commandBus->handle($command);
        return response($data);
    }

    public function update(Request $request, $id)
    {
        $command = new UpdateFlightProgramCommand($request->all(), $id);
        return $this->commandBus->handle($command);
    }

    public function destroy($id)
    {
        $command = new DeleteFlightProgramCommand($id);
        return $this->commandBus->handle($command);
    }
}
