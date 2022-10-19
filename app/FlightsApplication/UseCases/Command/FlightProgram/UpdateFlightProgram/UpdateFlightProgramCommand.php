<?php

namespace App\FlightsApplication\UseCases\Command\FlightProgram\UpdateFlightProgram;

use Illuminate\Http\Request;

class UpdateFlightProgramCommand
{
    private array $data;
    private int $id;

    /**
     * @param array $data
     * @param int $id
     */
    public function __construct(array $data, int $id)
    {
        $this->data = $data;
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
