<?php

namespace App\FlightsInfrastructure\Validators;

use App\FlightsDomain\Repository\IValidate;
use Illuminate\Support\Facades\Validator;

class FlightBulkEnableValidator implements IValidate
{
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validate(array $data): array
    {
        $rules = [
            "data" => 'required|array|min:1',
            "data.*.id" => 'required|int',
            "data.*.flightProgramId" => 'required|int',
            "data.*.startTime" => 'required|date',
            "data.*.endTime" => 'required|date',
            "data.*.crewUuid" => 'required',
            "data.*.aircraftUuid" => 'required',
            'data.*.flightNumber' => 'required',
            'data.*.status' => 'nullable',


        ];
        $data = Validator::make($data, $rules)->validate();
        return $data["data"];
    }
}
