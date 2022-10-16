<?php

namespace App\FlightsDomain\ValueObjects;

use Illuminate\Support\ItemNotFoundException;

class AirportCode
{
    private string $airportCode;
    public const AIRPORT_CODES = [
        // Bolivia airport codes
        "VVI","LPB","CBB","TJA","CIJ","SRZ","SRE","PSZ","GYA","RIB","CCA","PUR","REY","SRJ"
        // USA airport codes
        ,"ATL","LAX","ORD","DFW","DEN","JFK","SFO","SEA","LAS","MCO","CTL","MIA","LGA"
    ];

    /**
     * @param string $airportCode
     */
    public function __construct(string $airportCode)
    {
        if (!$this->isValidAirport($airportCode)) {
            throw new ItemNotFoundException("AIRPORT CODE IS NOT VALID");
        }
        $this->airportCode = $airportCode;
    }

    private function isValidAirport(string $airportCode)
    {
        return in_array($airportCode, self::AIRPORT_CODES);
    }

    /**
     * @return string
     */
    public function getAirportCode(): string
    {
        return $this->airportCode;
    }
}
