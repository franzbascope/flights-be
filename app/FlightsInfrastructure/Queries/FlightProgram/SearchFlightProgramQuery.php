<?php

namespace App\FlightsInfrastructure\Queries\FlightProgram;

use App\FlightsApplication\UseCases\Command\Flight\QueryFlights\QueryFlightsCommand;
use App\FlightsApplication\UseCases\Command\FlightProgram\QueryFlightPrograms\QueryFlightProgramCommand;
use App\Models\FlightProgram;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SearchFlightProgramQuery
{
    private QueryFlightProgramCommand $command;

    /**
     * @param QueryFlightProgramCommand $command
     */
    public function __construct(QueryFlightProgramCommand $command)
    {
        $this->command = $command;
    }


    public function getQuery(): Builder
    {
        $query = FlightProgram::query();
        if ($this->command->getSourceAirport()) {
            $query->where("sourceAirport", $this->command->getSourceAirport());
        }
        if ($this->command->getDestinyAirport()) {
            $query->where("destinyAirport", $this->command->getDestinyAirport());
        }
        if ($this->command->isIncludeFlights()) {
            $query->with("flights");
        }
        if($this->command->getFlightProgramId()){
            $query->where("id",$this->command->getFlightProgramId());
        }
        return $query;
    }
}
