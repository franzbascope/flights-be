<?php

namespace App\FlightsInfrastructure\Validators;

use App\FlightsDomain\Repository\IValidate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FlightBulkInsertValidator implements IValidate
{
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validate(array $data): array
    {
        $rules = [
            "data" => 'required|array|min:1',
            "data.*.flightProgramId" => 'required|int',
            "data.*.scheduledStartTime" => 'required|date',
            "data.*.scheduledEndTime" => 'required|date',

        ];
        $data = Validator::make($data, $rules)->validate();
        $parsedData = $data["data"];
        return Collect($parsedData)->map(function ($item) {
            $item["uuid"] = Str::uuid()->toString();
            return $item;
        })->toArray();
    }
}
