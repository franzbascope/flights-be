<?php

namespace App\FlightsDomain\Repository;

interface IValidate
{
    public function validate(array $data):array;

}
