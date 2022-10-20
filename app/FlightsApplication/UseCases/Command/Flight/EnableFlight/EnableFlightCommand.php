<?php

namespace App\FlightsApplication\UseCases\Command\Flight\EnableFlight;


use Illuminate\Support\Facades\Validator;

class EnableFlightCommand
{
    private array $data;
    private $flightId;

    /**
     * @param array $data
     * @param $flightId
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __construct(array $data, $flightId)
    {
        // validate data
        $data = Validator::make($data, [
            "crewUuid" => 'required',
            "startTime" => 'date|required',
            "endTime" => 'date|required',
            "aircraftUuid" => 'string|required',
            "flightNumber" => 'required',
            "information" => 'nullable'
        ])->validate();

        $this->data = $data;
        $this->flightId = $flightId;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getFlightId()
    {
        return $this->flightId;
    }


}
