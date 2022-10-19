<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $uuid
 * @property string $sourceAirport
 * @property string $destinyAirport
 * @property int|null $itinerary_id
 */
class FlightProgram extends Model
{
    use HasFactory;

    public function flights()
    {
        return $this->hasMany(Flight::class, "flightProgramId");
    }
}
