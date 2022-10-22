<?php

namespace Tests\Unit\FlightInfrastructure;

use App\FlightsDomain\Model\DomainEvent;
use App\FlightsInfrastructure\EventPublisher;
use App\Models\FlightProgram;
use Aws\Sns\SnsClient;
use Mockery;
use Mockery\Mock;
use Tests\TestCase;

class EventPublisherTest extends TestCase
{

    public function test_publish()
    {
        $this->expectException(\Exception::class);
       $domainEvent = new DomainEvent(now()->toDateTime(),[],"","");
        $eventPublisherTest = new EventPublisher();
        $eventPublisherTest->publish($domainEvent);
    }


    public function test__getSqsClient()
    {
        $eventPublisherTest = new EventPublisher();
        $response =  $eventPublisherTest->getSqsClient();
        $this->assertInstanceOf(SnsClient::class,$response);
    }

}
