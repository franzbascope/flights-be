<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessAddFlight;
use App\Jobs\ProcessCanceledFlight;
use App\Models\Flight;
use Aws\Sqs\SqsClient;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data["uuid"] = uniqid("flight");
        $flight = Flight::create($data);
        ProcessAddFlight::dispatch($flight);
        //Connect to SQS
        $client = SqsClient::factory([

            'credentials' => [
                'key' => "AKIASZCTJFEFUAFCOP76", //use your AWS key here
                'secret' => "NbwH5V9MyfOIXjIcyScHnXHpeyvZxwvzTEdOgJqK" //use your AWS secret here
            ],

            'region' => 'us-east-1', //replace it with your region
            'version' => 'latest'
        ]);

        $client->sendMessage([
            'QueueUrl' => "https://sqs.us-east-1.amazonaws.com/191300708619/flights", //your queue url goes here
            'MessageBody' =>  json_encode(["event"=>"FlightCreated","data"=> $flight]),
        ]);
        return Flight::find($flight->id);
    }

    public function edit($flightUuid)
    {
        return Flight::query()->where("uuid", $flightUuid)->firstOrFail();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function update(Request $request, $flightUuid)
    {
        $flight = Flight::query()->where("uuid", $flightUuid)->firstOrFail();
        $data = $request->all();
        $flight->fill($data);
        return $flight;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function cancelFlight(Request $request, $flightUuid)
    {
        $flight = Flight::query()->where("uuid", $flightUuid)->firstOrFail();
        $data = $request->all();
        $flight->fill($data);
        ProcessCanceledFlight::dispatch($flight);
        $client = SqsClient::factory([

            'credentials' => [
                'key' => "AKIASZCTJFEFUAFCOP76", //use your AWS key here
                'secret' => "NbwH5V9MyfOIXjIcyScHnXHpeyvZxwvzTEdOgJqK" //use your AWS secret here
            ],

            'region' => 'us-east-1', //replace it with your region
            'version' => 'latest'
        ]);

        $client->sendMessage([
            'QueueUrl' => "https://sqs.us-east-1.amazonaws.com/191300708619/flights", //your queue url goes here
            'MessageBody' =>  json_encode(["event"=>"FlightCancelled","data"=> $flight]),
        ]);
        return $flight;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function destroy($flightUuid)
    {
        $flight = Flight::query()->where("uuid", $flightUuid)->firstOrFail();
        $flight->delete();
        return $flight;
    }
}
