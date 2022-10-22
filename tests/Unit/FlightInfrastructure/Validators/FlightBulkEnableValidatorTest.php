<?php

namespace Tests\Unit\FlightInfrastructure\Validators;

use App\FlightsDomain\Model\EntityFlight;
use App\FlightsInfrastructure\Validators\FlightBulkInsertValidator;
use Illuminate\Support\Facades\Validator;
use Mockery;
use Mockery\Mock;
use Tests\TestCase;

class FlightBulkEnableValidatorTest extends TestCase
{
    public function test_valid_date(){

        $this->expectExceptionMessage("Call to a member function validate() on null");
        Validator::shouldReceive("make");
        Validator::shouldReceive("validate");
        $validator = new FlightBulkInsertValidator();
        $validator->validate([]);
    }
}
