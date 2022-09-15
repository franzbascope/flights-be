<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = ["startTime","endTime","crew","aircraft","uuid","flight_program_id","unique_code","status"];
    protected $casts = [
        'aircraft' => 'array',
        'crew' => 'array',
    ];
}
