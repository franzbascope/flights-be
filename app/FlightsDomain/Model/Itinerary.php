<?php

namespace App\FlightsDomain\Model;

use App\FlightsDomain\ValueObjects\AirportCode;

class Itinerary extends Entity
{
    private string $sourceAirport;
    private string $destinyAirport;

    /**
     * @param string $sourceAirport
     * @param string $destinyAirport
     */
    public function __construct(AirportCode $sourceAirport, AirportCode $destinyAirport)
    {
        parent::__construct();
        $this->sourceAirport = $sourceAirport->getAirportCode();
        $this->destinyAirport = $destinyAirport->getAirportCode();
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
