<?php

namespace App\FlightsApplication\UseCases\Command\Flight\DeleteFlight;

class DeleteFlightCommand
{

    private int $flightId;

    /**
     * @param int $flightId
     */
    public function __construct(int $flightId)
    {
        $this->flightId = $flightId;
    }

    /**
     * @return int
     */
    public function getFlightId(): int
    {
        return $this->flightId;
    }




}
