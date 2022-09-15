<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightProgram extends Model
{
    use HasFactory;

    protected $fillable = ["source_airport_code","destiny_airport_code","departure_week_days","flight","parent_flight","unique_code","uuid","flight_program_id"];
    protected $with = ['flight','flightPrograms'];

    public function flight()
    {
        return $this->hasOne(Flight::class);
    }

    public function flightPrograms()
    {
        return $this->hasMany(FlightProgram::class);
    }
}
