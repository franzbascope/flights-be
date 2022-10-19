<?php

namespace App\FlightsApplication\UseCases\Command\FlightProgram\DeleteFlightProgram;

class DeleteFlightProgramCommand
{
    public $flightProgramId;

    /**
     * @param $flightProgramId
     */
    public function __construct($flightProgramId)
    {
        $this->flightProgramId = $flightProgramId;
    }

    /**
     * @return mixed
     */
    public function getFlightProgramId()
    {
        return $this->flightProgramId;
    }
}
