<?php

namespace Tests\Unit\FlightInfrastructure\Events;

use App\FlightsInfrastructure\Events\FlightCreatedEvent;
use PHPUnit\Framework\TestCase;

class FlightCancelledTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFlightCancelled()
    {
        $cancelledEvent = new FlightCreatedEvent([]);
        $this->assertNotNull($cancelledEvent->created_at);
        $this->assertEquals([], $cancelledEvent->data);
        $this->assertNotNull($cancelledEvent->topic);
    }
}
