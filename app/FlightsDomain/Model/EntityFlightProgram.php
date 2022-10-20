<?php

namespace App\FlightsDomain\Model;

use App\FlightsDomain\ValueObjects\AirportCode;
use App\FlightsDomain\ValueObjects\ItineraryId;

class EntityFlightProgram extends Entity
{
    private string $sourceAirport;
    private string $destinyAirport;
    private int $itineraryId;
    private string $flightCode;

    /**
     * @return string
     */
    public function getFlightCode(): string
    {
        return $this->flightCode;
    }

    /**
     * @param AirportCode $sourceAirport
     * @param AirportCode $destinyAirport
     * @param string $itineraryId
     */
    public function __construct(AirportCode $sourceAirport, AirportCode $destinyAirport, ItineraryId $itineraryId,string $flightCode)
    {
        parent::__construct();
        $this->sourceAirport = $sourceAirport->getAirportCode();
        $this->destinyAirport = $destinyAirport->getAirportCode();
        $this->itineraryId = $itineraryId->getItineraryId();
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
    public function getItineraryId(): string
    {
        return $this->itineraryId;
    }
}
