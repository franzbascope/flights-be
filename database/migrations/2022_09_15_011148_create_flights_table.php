<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
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
            $table->string("uuid");
            $table->string("unique_code");
            $table->dateTime("startTime");
            $table->dateTime("endTime");
            $table->text("crew");
            $table->text("aircraft");
            $table->enum("status",["active","cancelled"])->default("active");
            $table->bigInteger("flight_program_id")->unsigned()->nullable();
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
