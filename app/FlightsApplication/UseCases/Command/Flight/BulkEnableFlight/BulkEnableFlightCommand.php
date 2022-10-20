<?php

namespace App\FlightsApplication\UseCases\Command\Flight\BulkEnableFlight;

use App\FlightsInfrastructure\Validators\FlightBulkEnableValidator;

class BulkEnableFlightCommand
{
    private array $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $validator = new FlightBulkEnableValidator();
        $this->data = $validator->validate($data);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
