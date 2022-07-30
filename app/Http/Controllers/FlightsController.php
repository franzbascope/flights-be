<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightsController extends Controller
{
    public function index(){
        $flights = array($this->store(),$this->store());
        return $flights;
    }

    public function store(){
        return [ "uuid" => uniqid(),
            "flight_number" => mb_substr(0,5) ,
            "startDateTime" => new \DateTime(),
            "endDateTime" => new \DateTime(),
            "crew" => [],
            "airplane" => []
        ];
    }

}
