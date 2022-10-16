<?php

namespace App\Providers;

use App\FlightsDomain\Factories\FlightProgramFactory;
use App\FlightsDomain\Factories\IFlightProgramFactory;
use App\FlightsDomain\Factories\IItineraryFactory;
use App\FlightsDomain\Factories\ItineraryFactory;
use App\FlightsDomain\Repository\IEventPublisher;
use App\FlightsDomain\Repository\IFlightProgramRepository;
use App\FlightsDomain\Repository\IFlightRepository;
use App\FlightsDomain\Repository\IItineraryRepository;
use App\FlightsDomain\Repository\IUnitOfWork;
use App\FlightsInfrastructure\EventPublisher;
use App\FlightsInfrastructure\Repository\FlightProgramRepository;
use App\FlightsInfrastructure\Repository\FlightRepository;
use App\FlightsInfrastructure\Repository\ItineraryRepository;
use App\FlightsInfrastructure\UnitOfWork;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        IUnitOfWork::class => UnitOfWork::class,
        IItineraryRepository::class => ItineraryRepository::class,
        IItineraryFactory::class => ItineraryFactory::class,
        IFlightProgramFactory::class => FlightProgramFactory::class,
        IFlightProgramRepository::class => FlightProgramRepository::class,
        IEventPublisher::class => EventPublisher::class,
        IFlightRepository::class => FlightRepository::class,
    ];


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
