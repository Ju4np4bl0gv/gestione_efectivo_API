<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Vehiculos;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'marca'      => 'required',
                'placa'      => 'required|unique:vehiculos',
                'creado_por' => 'required',
            ]);


            $vehiculo = Vehiculos::create($request->all());

            return ApiResponse::success('registro agregado', 201, $vehiculo);
        } catch (\Throwable $th) {
            return ApiResponse::error('Ocurrio un error', 401);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculos $vehiculos)
    {
        //
    }
}
