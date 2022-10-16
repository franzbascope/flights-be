<?php

namespace App\FlightsDomain\Repository;

use App\FlightsDomain\Model\Itinerary;

interface IItineraryRepository
{
    public function create(Itinerary $itinerary);

    public function getById(int $id);
}
