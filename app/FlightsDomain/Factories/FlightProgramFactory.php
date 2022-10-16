<?php

namespace App\FlightsDomain\Factories;

use App\FlightsDomain\Model\FlightProgram;
use App\FlightsDomain\Repository\IItineraryRepository;
use App\FlightsDomain\ValueObjects\AirportCode;
use App\FlightsDomain\ValueObjects\ItineraryId;
use Illuminate\Support\Facades\App;

class FlightProgramFactory implements IFlightProgramFactory
{
    public function create(string $sourceAirport, string $destinyAirport, int $itineraryId): FlightProgram
    {
        $sourceAirportCode = new AirportCode($sourceAirport);
        $destinyAirportCode = new AirportCode($destinyAirport);
        $itineraryRepository = App::make(IItineraryRepository::class);
        $itinerary = new ItineraryId($itineraryId, $itineraryRepository);
        return new FlightProgram($sourceAirportCode, $destinyAirportCode, $itinerary);
    }
}
