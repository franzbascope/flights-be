<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\FlightsController;
use PHPUnit\Framework\TestCase;

class FlightControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIndex(): void
    {
        $controller = new FlightsController();
        $response = $controller->index();
        $this->assertIsArray($response);
    }

    public function testStore(): void
    {
        $controller = new FlightsController();
        $response = $controller->store();
        $this->assertIsArray($response);
    }
}
