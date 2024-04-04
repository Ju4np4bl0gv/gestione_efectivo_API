<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Guarda;
use App\Models\guarda_programacion;
use App\Models\Programacion;
use Illuminate\Http\Request;

class ProgramacionController extends Controller
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
                'fecha_i'       => 'required',
                'fecha_f'       => 'required',
                'vehiculo_id'   => 'required|exists:vehiculos,id',
                'ruta_id'       => 'required|exists:rutas,id',
                "guarda_id"     => 'required' 
    
            ]);

            return     $guarda =Guarda::find($request -> guarda_id);

    
            $programaciones = Programacion::create($request->all());
           return ApiResponse::success("agregado exitosamente", 201,  $programaciones);
        } catch (\Throwable $th) {
            return ApiResponse::error("Sucedio un error", 401);

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Programacion $programacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Programacion $programacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programacion $programacion)
    {
        //
    }
}
