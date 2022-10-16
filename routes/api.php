<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/itinerary',[\App\Http\Controllers\ItineraryController::class,'store'])->name("itinerary.store");
Route::post('/flight_program',[\App\Http\Controllers\FlightProgramController::class,'store'])->name("flight_program.store");
Route::post('/flight',[\App\Http\Controllers\FlightController::class,'store'])->name("flight.store");
Route::patch('/flight/{id}',[\App\Http\Controllers\FlightController::class,'cancel'])->name("flight.cancel");
