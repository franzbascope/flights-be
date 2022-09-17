<?php

namespace App\Http\Controllers;

use App\Models\FlightProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FlightProgramController extends Controller
{
    public function index()
    {
        return FlightProgram::query()->where("flight_program_id", "=", null)->get()->all();
    }

    public function edit($flightProgramUuid)
    {
        return FlightProgram::query()->where("uuid", $flightProgramUuid)->firstOrFail();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data["uuid"] = Str::uuid();
        $flightProgram = FlightProgram::create($data);
        if ($flightProgram->flight_program_id) {
            return FlightProgram::find($flightProgram->flight_program_id);
        }
        return $flightProgram;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FlightProgram  $flightProgram
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function update(Request $request, $flightProgramUuid)
    {
        $flightProgram = FlightProgram::query()->where("uuid", $flightProgramUuid)->firstOrFail();
        $flightProgram->fill($request->all());
        $flightProgram->save();
        return $flightProgram;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FlightProgram  $flightProgram
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function destroy($flightProgramUuid)
    {
        $flightProgram = FlightProgram::query()->where("uuid", $flightProgramUuid)->firstOrFail();
        $flightProgram->delete();
        return $flightProgram;
    }
}
