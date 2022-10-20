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

// Itinerary
Route::post('/itinerary',[\App\Http\Controllers\ItineraryController::class,'store'])->name("itinerary.store");
Route::get('/itinerary',[\App\Http\Controllers\ItineraryController::class,'index'])->name("itinerary.index");
Route::delete('/itinerary/{id}',[\App\Http\Controllers\ItineraryController::class,'destroy'])->name("itinerary.destroy");
Route::put('/itinerary/{id}',[\App\Http\Controllers\ItineraryController::class,'update'])->name("itinerary.update");

//Flight Programs
Route::post('/flight_program',[\App\Http\Controllers\FlightProgramController::class,'store'])->name("flight_program.store");
Route::get('/flight_program',[\App\Http\Controllers\FlightProgramController::class,'index'])->name("flight_program.index");
Route::put('/flight_program/{id}',[\App\Http\Controllers\FlightProgramController::class,'update'])->name("flight_program.update");
Route::delete('/flight_program/{id}',[\App\Http\Controllers\FlightProgramController::class,'destroy'])->name("flight_program.destroy");


//Flights
Route::post('/flight/bulk',[\App\Http\Controllers\FlightController::class,'bulkStore'])->name("flight.bulkStore");
Route::post('/flight/bulk_enable',[\App\Http\Controllers\FlightController::class,'bulkEnable'])->name("flight.bulkEnable");
Route::post('/flight',[\App\Http\Controllers\FlightController::class,'store'])->name("flight.store");
Route::get('/flight',[\App\Http\Controllers\FlightController::class,'index'])->name("flight.index");
Route::put('/flight/{id}',[\App\Http\Controllers\FlightController::class,'update'])->name("flight.update");
Route::delete('/flight/{id}',[\App\Http\Controllers\FlightController::class,'destroy'])->name("flight.destroy");
Route::patch('/flight/cancel/{id}',[\App\Http\Controllers\FlightController::class,'cancel'])->name("flight.cancel");
Route::patch('/flight/enable/{id}',[\App\Http\Controllers\FlightController::class,'enable'])->name("flight.enable");

// Auth
Route::post('/login',[\App\Http\Controllers\LoginController::class,"login"])->name("login.login");
