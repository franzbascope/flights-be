<?php

namespace App\FlightsApplication\UseCases\Command\Itinierary\DeleteItinerary;

use App\FlightsDomain\Repository\IItineraryRepository;

class DeleteItineraryHandler
{
    private IItineraryRepository $itineraryRepository;

    /**
     * @param IItineraryRepository $itineraryRepository
     */
    public function __construct(IItineraryRepository $itineraryRepository)
    {
        $this->itineraryRepository = $itineraryRepository;
    }


    public function __invoke(DeleteItineraryCommand $command)
    {
        return $this->itineraryRepository->delete($command->getItineraryId());
    }
}
