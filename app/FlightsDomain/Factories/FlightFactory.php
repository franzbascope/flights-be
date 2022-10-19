<?php

namespace App\FlightsDomain\Factories;

use App\FlightsDomain\Model\EntityFlight;
use App\FlightsDomain\ValueObjects\FlightStatus;
use Illuminate\Http\Request;

class FlightFactory
{
    public function create(Request $request): EntityFlight
    {
        $startTime = $request->get("startTime");
        $endTime = $request->get("endTime");
        $crewUuid = $request->get("crewUuid");
        $aircraftUuid = $request->get("aircraftUuid");
        $status = $request->get("status");
        $flightProgramId = $request->get("flightProgramId");
        $information = $request->get("information");
        $validatesStatus = new FlightStatus($status);
        return new EntityFlight(new \DateTime($startTime), new \DateTime($endTime), $crewUuid, $aircraftUuid, $validatesStatus, $flightProgramId, $information);
    }
}
