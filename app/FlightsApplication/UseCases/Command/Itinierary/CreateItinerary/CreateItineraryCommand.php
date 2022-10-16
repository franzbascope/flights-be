<?php

namespace App\FlightsApplication\UseCases\Command\Itinierary\CreateItinerary;

class CreateItineraryCommand
{
    private string $sourceAirport;
    private string $destinyAirport;

    /**
     * @param string $sourceAirport
     * @param string $destinyAirport
     */
    public function __construct(string $sourceAirport, string $destinyAirport)
    {
        $this->sourceAirport = $sourceAirport;
        $this->destinyAirport = $destinyAirport;
    }

    /**
     * @return string
     */
    public function getSourceAirport(): string
    {
        return $this->sourceAirport;
    }

    /**
     * @return string
     */
    public function getDestinyAirport(): string
    {
        return $this->destinyAirport;
    }
}
