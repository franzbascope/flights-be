<?php

namespace App\FlightsApplication\UseCases\Command\FlightProgram\QueryFlightPrograms;

use Illuminate\Http\Request;

class QueryFlightProgramCommand
{
    private string $sourceAirport;
    private string $destinyAirport;
    private bool $includeFlights;

    /**
     * @param string $sourceAirport
     * @param string $destinyAirport
     */
    public function __construct(string $sourceAirport, string $destinyAirport,bool $includeFlights)
    {
        $this->sourceAirport = $sourceAirport;
        $this->destinyAirport = $destinyAirport;
        $this->includeFlights = $includeFlights;
    }

    /**
     * @return bool
     */
    public function isIncludeFlights(): bool
    {
        return $this->includeFlights;
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
