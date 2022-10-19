<?php

namespace App\Http\Controllers;

use App\FlightsApplication\UseCases\Command\CommandBus;
use App\FlightsApplication\UseCases\Command\Flight\CancelFlightCommand;
use App\FlightsApplication\UseCases\Command\Flight\CreateFlightCommand;
use App\FlightsApplication\UseCases\Command\Flight\DeleteFlight\DeleteFlightCommand;
use App\FlightsApplication\UseCases\Command\Flight\QueryFlights\QueryFlightsCommand;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FlightController extends Controller
{
    public function __construct(private CommandBus $commandBus)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $command = new CreateFlightCommand($request);
        $flight = $this->commandBus->handle($command);
        return response($flight);
    }

    public function index(Request $request)
    {
        $command = new QueryFlightsCommand($request);
        $data = $this->commandBus->handle($command);
        return response($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param   $flightId
     * @return Response
     */
    public function cancel($flightId)
    {
        $command = new CancelFlightCommand($flightId);
        $flight =  $this->commandBus->handle($command);
        return response($flight);
    }

    public function destroy($flightId){
        $command = new DeleteFlightCommand($flightId);
        return $this->commandBus->handle($command);

    }
}
