<?php

namespace App\FlightsDomain\Repository;

use App\FlightsDomain\Model\EntityItinerary;

interface IItineraryRepository
{
    public function create(EntityItinerary $itinerary);

    public function getById(int $id);
}
