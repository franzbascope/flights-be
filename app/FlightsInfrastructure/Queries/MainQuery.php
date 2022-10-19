<?php

namespace App\FlightsInfrastructure\Queries;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MainQuery
{
    protected function buildQueryFromRequest(Builder $query,array $properties, Request $request){
        foreach ($properties as $property){
            $value = $request->get($property);
            if($value){
                $query->where($property,$value);
            }
        }
        return $query;

    }

}
