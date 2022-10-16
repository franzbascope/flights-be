<?php

namespace App\FlightsDomain\ValueObjects;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class FlightStatus
{
    private string $flightStatus;
    public const FLIGHT_STATUS = ['active','cancelled'];

    /**
     * @param string $flightStatus
     */
    public function __construct(string $flightStatus)
    {
        if (!in_array($flightStatus, self::FLIGHT_STATUS)) {
            throw new BadRequestException("Flight status is not valid");
        }
        $this->flightStatus = $flightStatus;
    }

    /**
     * @return string
     */
    public function getFlightStatus(): string
    {
        return $this->flightStatus;
    }
}
