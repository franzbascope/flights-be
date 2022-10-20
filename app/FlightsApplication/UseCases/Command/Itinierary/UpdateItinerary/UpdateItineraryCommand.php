<?php

namespace App\FlightsApplication\UseCases\Command\Itinierary\UpdateItinerary;

class UpdateItineraryCommand
{
    private array $data;
    private int $itineraryId;

    /**
     * @param array $data
     * @param int $itineraryId
     */
    public function __construct(array $data, int $itineraryId)
    {
        $this->data = $data;
        $this->itineraryId = $itineraryId;
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
    public function getItineraryId(): int
    {
        return $this->itineraryId;
    }




}
