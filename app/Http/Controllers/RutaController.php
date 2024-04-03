<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Punto;
use App\Models\Ruta;
use App\Models\Vehiculos;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Ruta::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {

            $request->validate([
                'nombre_ruta' => 'required|unique:rutas',
                'creado_por'  => 'required',
                'punto_id'  => 'required|exists:puntos,id',
            ]);

            $ruta     =  Ruta::create($request->all());
            $ruta->puntos()->attach($request->punto_id);

            return ApiResponse::success('Ruta creada', 200, $ruta);
        } catch (\Throwable $th) {
            //throw $th;
            return ApiResponse::error('Ocurrio un error', 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruta $ruta)
    {

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruta $ruta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruta $ruta)
    {
        //
    }
}
