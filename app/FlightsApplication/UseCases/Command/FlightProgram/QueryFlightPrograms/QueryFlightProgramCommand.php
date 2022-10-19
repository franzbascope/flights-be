<?php

namespace App\FlightsApplication\UseCases\Command\FlightProgram\QueryFlightPrograms;

use Illuminate\Http\Request;

class QueryFlightProgramCommand
{
    public Request $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
