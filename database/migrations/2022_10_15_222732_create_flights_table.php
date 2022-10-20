<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime("scheduledStartTime")->nullable();
            $table->dateTime("scheduledEndTime")->nullable();
            $table->string("flightNumber")->nullable();
            $table->dateTime("startTime")->nullable();
            $table->dateTime("endTime")->nullable();
            $table->string("uuid");
            $table->string("crewUuid")->nullable();
            $table->string("aircraftUuid")->nullable();
            $table->enum("status",["active","cancelled","pending"])->default("pending");
            $table->integer("flightProgramId");
            $table->text("information")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
};
