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
        Schema::create('flight_programs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("uuid");
            $table->string("sourceAirport");
            $table->string("destinyAirport");
            $table->unsignedBigInteger("itinerary_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_programs');
    }
};
