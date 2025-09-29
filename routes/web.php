<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $owners = \App\Http\Resources\OwnerResource::collection(\App\Models\Owner::all());
    return view('welcome')->with('owners', $owners);
});

Route::resources([
    'owner.cars' => \App\Http\Controllers\CarController::class,
    'owner' => \App\Http\Controllers\OwnerController::class,
]);
