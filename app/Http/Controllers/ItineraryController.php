<?php

namespace App\Http\Controllers;

use App\FlightsApplication\UseCases\Command\CommandBus;
use App\FlightsApplication\UseCases\Command\Itinierary\CreateItinerary\CreateItineraryCommand;
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
    public function index()
    {
        //
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
}
