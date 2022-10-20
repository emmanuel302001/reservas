<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SalaController;
use App\Http\Controllers\API\CompradorController;
use App\Http\Controllers\API\ReservaController;

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

Route::get('salas', [SalaController::class, 'index']);
Route::get('comprador', [CompradorController::class, 'index']);
Route::get('comprador/{comprador}', [CompradorController::class, 'show']);
Route::post('comprador', [CompradorController::class, 'store']);
Route::post('reserva', [ReservaController::class, 'store']);
