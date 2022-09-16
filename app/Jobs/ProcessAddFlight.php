<?php

namespace App\Jobs;

use App\Models\Flight;
use App\Models\FlightProgram;
use Aws\Sqs\SqsClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Queue;
use Illuminate\Queue\SerializesModels;

class ProcessAddFlight implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $flight;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Flight $flight)
    {
        $this->flight = $flight;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->flight->notified = true;
        $this->flight->save();
        var_dump("test");
        error_log("message");
        error_log(json_encode($this->flight));
    }
}
