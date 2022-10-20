<?php

namespace App\FlightsApplication\UseCases\Command\Flight\UpdateFlight;

use Illuminate\Http\Request;

class UpdateFlightCommand
{
    private array $data;
    private int $flightId;

    /**
     * @param array $data
     * @param int $flightId
     */
    public function __construct(array $data, int $flightId)
    {
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
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getFlightId(): int
    {
        return $this->flightId;
    }

    /**
     * @param int $flightId
     */
    public function setFlightId(int $flightId): void
    {
        $this->flightId = $flightId;
    }
}
