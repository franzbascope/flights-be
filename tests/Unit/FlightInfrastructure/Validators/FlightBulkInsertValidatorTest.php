<?php

namespace Tests\Unit\FlightInfrastructure\Validators;

use App\FlightsInfrastructure\Validators\FlightBulkInsertValidator;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class FlightBulkInsertValidatorTest extends  TestCase
{
    public function test_valid_date(){

        $this->expectExceptionMessage("Call to a member function validate() on null");
        Validator::shouldReceive("make");
        Validator::shouldReceive("validate");
        $validator = new FlightBulkInsertValidator();
        $validator->validate([]);
    }

}
