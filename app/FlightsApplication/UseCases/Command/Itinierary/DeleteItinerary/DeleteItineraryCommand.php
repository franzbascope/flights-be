<?php

namespace App\FlightsApplication\UseCases\Command\Itinierary\DeleteItinerary;

class DeleteItineraryCommand
{
    private int $itineraryId;

    /**
     * @param int $itineraryId
     */
    public function __construct(int $itineraryId)
    {
        $this->itineraryId = $itineraryId;
    }

    /**
     * @return int
     */
    public function getItineraryId(): int
    {
        return $this->itineraryId;
    }
}
