<?php

namespace App\FlightsApplication\UseCases\Command\Itinierary\CreateItinerary;

use App\FlightsDomain\Factories\IItineraryFactory;
use App\FlightsDomain\Repository\IItineraryRepository;
use App\FlightsDomain\Repository\IUnitOfWork;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class CreateItineraryHandler
{
    private IItineraryRepository $itineraryRepository;
    private IUnitOfWork $unitOfWork;
    private IItineraryFactory $itineraryFactory;

    /**
     * @param IItineraryRepository $itineraryRepository
     * @param IUnitOfWork $unitOfWork
     * @param IItineraryFactory $itineraryFactory
     */
    public function __construct(IItineraryRepository $itineraryRepository, IUnitOfWork $unitOfWork, IItineraryFactory $itineraryFactory)
    {
        $this->itineraryRepository = $itineraryRepository;
        $this->unitOfWork = $unitOfWork;
        $this->itineraryFactory = $itineraryFactory;
    }

    /**
     * @throws \Exception
     */
    public function __invoke(CreateItineraryCommand $command)
    {
        try {
            $itinerary = $this->itineraryFactory->create($command->getSourceAirport(), $command->getDestinyAirport());
            $this->unitOfWork->beginTransaction();
            $savedItinerary = $this->itineraryRepository->create($itinerary);
            $this->unitOfWork->commit();
            return $savedItinerary;
        } catch (\Exception $ex) {
            $this->unitOfWork->rollBack();
            Log::error("Not able to create itinerary", $ex->getTrace());
            throw $ex;
        }
    }
}
