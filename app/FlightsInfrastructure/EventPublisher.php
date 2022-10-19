<?php

namespace App\FlightsInfrastructure;

use App\FlightsDomain\Model\DomainEvent;
use App\FlightsDomain\Repository\IEventPublisher;
use Aws\Sns\SnsClient;
use Aws\Sqs\SqsClient;

class EventPublisher implements IEventPublisher
{

    public function publish(DomainEvent $event)
    {
        $client = $this->getSqsClient();
        $client->publish([
            'Subject' => $event->name,
            'Message' =>  json_encode(["event"=>$event->name,"data"=> $event->data]),
            'TopicArn' => $event->topic,
        ]);
    }

    private function getSqsClient()
    {
        return new SnsClient([
            'credentials' => [
                'key' => env("AWS_ACCESS_KEY_ID"),
                'secret' => env("AWS_SECRET_ACCESS_KEY")
            ],
            'region' => env("AWS_DEFAULT_REGION"),
            'version' => 'latest'
        ]);
    }
}
