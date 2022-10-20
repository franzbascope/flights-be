<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $startTime
 * @property string $endTime
 * @property string $uuid
 * @property string $crewUuid
 * @property string $aircraftUuid
 * @property string $status
 * @property int $flightProgramId
 * @property string $information
 */
class Flight extends Model
{
    use HasFactory;

    protected $casts = [
        'information' => 'json',
    ];

    protected $fillable = ["startTime","endTime","crewUuid","aircraftUuid","status","information","flightNumber"];



    public function flightProgram()
    {
        return $this->belongsTo(FlightProgram::class, "flightProgramId");
    }
}
