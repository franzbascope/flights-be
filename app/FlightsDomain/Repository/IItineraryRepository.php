<?php

namespace App\FlightsDomain\Repository;

use App\FlightsDomain\Model\EntityItinerary;
use Illuminate\Database\Eloquent\Builder;

interface IItineraryRepository
{
    public function create(EntityItinerary $itinerary);

    public function getById(int $id);

    public function query(?Builder $query);

    public function delete(int $itineraryId);

    public function update(array $data, int $id);
}
