<?php

namespace App\FlightsDomain\ValueObjects;

use App\FlightsDomain\Repository\IItineraryRepository;
use App\Models\Itinerary;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ItineraryId
{
    private Itinerary $itinerary;

    /**
     * @param int $itineraryId
     * @param IItineraryRepository $itineraryRepository
     */
    public function __construct(int $itineraryId, IItineraryRepository $itineraryRepository)
    {
        $result = $itineraryRepository->getById($itineraryId);
        if (!$result) {
            throw new ModelNotFoundException("Itinerary Id was not found");
        }
        $this->itinerary = $result;
    }

    /**
     * @return int
     */
    public function getItineraryId(): int
    {
        return $this->itinerary->id;
    }
}
