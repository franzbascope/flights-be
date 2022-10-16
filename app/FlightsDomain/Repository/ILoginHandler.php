<?php

namespace App\FlightsDomain\Repository;

interface ILoginHandler
{
    public function login(string $username,string $password);

}
