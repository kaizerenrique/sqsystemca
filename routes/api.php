<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

// Ruta de Informacion del usuario
Route::post('/infouser',[ApiController::class,'infouser'])->middleware('auth:sanctum');

// Ruta de informacion de personas lista
Route::get('/listadopersonas',[ApiController::class,'listadoPersonas'])->middleware('auth:sanctum');