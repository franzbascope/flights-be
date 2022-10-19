<?php

namespace App\FlightsApplication\UseCases\Command\Flight\QueryFlights;

use Illuminate\Http\Request;

class QueryFlightsCommand
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
