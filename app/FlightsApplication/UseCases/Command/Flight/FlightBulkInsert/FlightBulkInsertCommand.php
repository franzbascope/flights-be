<?php

namespace App\FlightsApplication\UseCases\Command\Flight\FlightBulkInsert;

use App\FlightsInfrastructure\Validators\FlightBulkInsertValidator;

class FlightBulkInsertCommand
{
    private array $data;

    /**
     * @param array $data
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __construct(array $data)
    {
        $validator = new FlightBulkInsertValidator();
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
