<?php

use App\Http\Controllers\PuntoController;
use App\Http\Controllers\RutaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('rutas', RutaController::class);
Route::apiResource('puntos', PuntoController::class);


