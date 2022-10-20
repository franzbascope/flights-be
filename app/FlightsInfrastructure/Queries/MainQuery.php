<?php

namespace App\FlightsInfrastructure\Queries;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MainQuery
{
    protected function buildQueryFromRequest(Builder $query, array $properties,array $data)
    {
        foreach ($properties as $property) {
            $value = $data[$property] ?? null;
            if ($value) {
                $query->where($property, $value);
            }
        }
        return $query;
    }
}
