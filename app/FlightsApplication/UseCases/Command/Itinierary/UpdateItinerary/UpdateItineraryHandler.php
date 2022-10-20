<?php

namespace App\FlightsApplication\UseCases\Command\Itinierary\UpdateItinerary;

use App\FlightsDomain\Repository\IItineraryRepository;

class UpdateItineraryHandler
{
    private IItineraryRepository $itineraryRepository;

    /**
     * @param IItineraryRepository $itineraryRepository
     */
    public function __construct(IItineraryRepository $itineraryRepository)
    {
        $this->itineraryRepository = $itineraryRepository;
    }

    public function __invoke(UpdateItineraryCommand $command)
    {
        return $this->itineraryRepository->update($command->getData(),$command->getItineraryId());
    }


}
