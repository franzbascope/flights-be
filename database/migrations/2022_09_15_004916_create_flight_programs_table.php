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
        Schema::create('flight_programs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("uuid");
            $table->string("source_airport_code",20);
            $table->string("destiny_airport_code",20);
            $table->enum("departure_week_days",["MON","TUE","WED","THU","FRI","SAT","SUN"])->nullable();
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
        Schema::dropIfExists('flight_programs');
    }
};
