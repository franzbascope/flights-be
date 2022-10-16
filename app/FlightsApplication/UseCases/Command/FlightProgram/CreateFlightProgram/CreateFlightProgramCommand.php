<?php

namespace App\FlightsApplication\UseCases\Command\FlightProgram\CreateFlightProgram;

class CreateFlightProgramCommand
{
    private string $sourceAirport;
    private string $destinyAirport;
    private int $itineraryId;

    /**
     * @param string $sourceAirport
     * @param string $destinyAirport
     * @param int $itineraryId
     */
    public function __construct(string $sourceAirport, string $destinyAirport, int $itineraryId)
    {
        $this->sourceAirport = $sourceAirport;
        $this->destinyAirport = $destinyAirport;
        $this->itineraryId = $itineraryId;
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
     * @return int
     */
    public function getItineraryId(): int
    {
        return $this->itineraryId;
    }
}
