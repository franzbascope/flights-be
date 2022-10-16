<?php

namespace App\FlightsApplication\UseCases\Command\Flight;

class CancelFlightCommand
{
    public $flightId;

    private $status = 'cancelled';

    /**
     * @param $flightId
     * @param string $status
     */
    public function __construct($flightId)
    {
        $this->flightId = $flightId;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
}
