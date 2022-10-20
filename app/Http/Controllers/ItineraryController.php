<?php

namespace App\Http\Controllers;

use App\FlightsApplication\UseCases\Command\CommandBus;
use App\FlightsApplication\UseCases\Command\Itinierary\CreateItinerary\CreateItineraryCommand;
use App\FlightsApplication\UseCases\Command\Itinierary\DeleteItinerary\DeleteItineraryCommand;
use App\FlightsApplication\UseCases\Command\Itinierary\QueryItinerary\QueryItineraryCommand;
use App\FlightsApplication\UseCases\Command\Itinierary\UpdateItinerary\UpdateItineraryCommand;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItineraryController extends Controller
{
    public function __construct(private CommandBus $commandBus)
    {
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $command = new QueryItineraryCommand($request->all());
        return $this->commandBus->handle($command);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sourceAirport' => 'required|max:3',
            'destinyAirport' => 'required|max:3'
        ]);
        $sourceAirport = $request->get("sourceAirport");
        $destinyAirport = $request->get("destinyAirport");

        $command = new CreateItineraryCommand($sourceAirport, $destinyAirport);
        $itinerary = $this->commandBus->handle($command);
        return response($itinerary);
    }

    public function destroy($itineraryId){
        $command = new DeleteItineraryCommand($itineraryId);
        return $this->commandBus->handle($command);
    }

    public function update(Request $request,$itineraryId){
        $command = new UpdateItineraryCommand($request->all(), $itineraryId);
        return $this->commandBus->handle($command);

    }
}
