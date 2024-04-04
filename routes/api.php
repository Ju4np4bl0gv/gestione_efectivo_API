<?php

use App\Http\Controllers\GuardaController;
use App\Http\Controllers\ProgramacionController;
use App\Http\Controllers\PuntoController;
use App\Http\Controllers\RolgdController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\VehiculosController;
use App\Models\Guarda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('rutas', RutaController::class);
Route::apiResource('puntos', PuntoController::class);
route::apiResource('guardas', GuardaController::class);
route::apiResource('rolgds', RolgdController::class);
route::apiResource('vehiculos', VehiculosController::class);
route::apiResource('programacions', ProgramacionController::class);

