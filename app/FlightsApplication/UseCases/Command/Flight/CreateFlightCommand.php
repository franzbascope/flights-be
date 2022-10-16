<?php

namespace App\FlightsApplication\UseCases\Command\Flight;

use Illuminate\Http\Request;

class CreateFlightCommand
{
    private Request $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }
}
