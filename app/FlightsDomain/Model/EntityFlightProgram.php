<?php

namespace App\FlightsDomain\Model;

use App\FlightsDomain\ValueObjects\AirportCode;
use App\FlightsDomain\ValueObjects\ItineraryId;

class EntityFlightProgram extends Entity
{
    private string $sourceAirport;
    private string $destinyAirport;
    private int $itineraryId;

    /**
     * @param AirportCode $sourceAirport
     * @param AirportCode $destinyAirport
     * @param string $itineraryId
     */
    public function __construct(AirportCode $sourceAirport, AirportCode $destinyAirport, ItineraryId $itineraryId)
    {
        parent::__construct();
        $this->sourceAirport = $sourceAirport->getAirportCode();
        $this->destinyAirport = $destinyAirport->getAirportCode();
        $this->itineraryId = $itineraryId->getItineraryId();
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
