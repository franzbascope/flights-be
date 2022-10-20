<?php

namespace App\FlightsApplication\UseCases\Command\Itinierary\QueryItinerary;

use App\FlightsDomain\Repository\IItineraryRepository;
use App\FlightsInfrastructure\Queries\Itinerary\SearchItineraryQuery;

class QueryItineraryHandler
{

    private IItineraryRepository $itineraryRepository;

    /**
     * @param IItineraryRepository $itineraryRepository
     */
    public function __construct(IItineraryRepository $itineraryRepository)
    {
        $this->itineraryRepository = $itineraryRepository;
    }


    public function __invoke(QueryItineraryCommand $command)
    {
        $query = (new SearchItineraryQuery())->getQuery($command->getData());
        return $this->itineraryRepository->query($query);
    }

}
