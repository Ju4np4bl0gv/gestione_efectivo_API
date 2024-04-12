<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CuadreController;
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
Route::apiResource('guardas', GuardaController::class);
Route::apiResource('rolgds', RolgdController::class);
Route::apiResource('vehiculos', VehiculosController::class);
Route::apiResource('programacions', ProgramacionController::class);
Route::apiResource('cuadres', CuadreController::class);


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
     Route::post('registrar', 'registrar');

});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('registrar', [AuthController::class, 'registrar']);
    Route::get('user-profile', [AuthController::class, 'userProfile']);
});
