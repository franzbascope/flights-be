<?php

namespace App\FlightsApplication\UseCases\Command\FlightProgram\CreateFlightProgram;

class CreateFlightProgramCommand
{
    private string $sourceAirport;
    private string $destinyAirport;
    private int $itineraryId;
    private string $flightCode;

    /**
     * @param string $sourceAirport
     * @param string $destinyAirport
     * @param int $itineraryId
     * @param string $flightCode
     */
    public function __construct(string $sourceAirport, string $destinyAirport, int $itineraryId, string $flightCode)
    {
        $this->sourceAirport = $sourceAirport;
        $this->destinyAirport = $destinyAirport;
        $this->itineraryId = $itineraryId;
        $this->flightCode = $flightCode;
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

    /**
     * @return string
     */
    public function getFlightCode(): string
    {
        return $this->flightCode;
    }

    /**
     * @return int
     */
    public function getItineraryId(): int
    {
        return $this->itineraryId;
    }
}
