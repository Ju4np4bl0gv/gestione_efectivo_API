<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Punto;
use App\Models\Ruta;
use App\Models\Vehiculos;
use Exception;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
                'creado_por' => 'required',
                'punto_id' => 'required|exists:puntos,id'
            ]);

            //|exists:puntos,id


            $ruta = Ruta::create($request->all());

            foreach ($request->punto_id as $key => $value) {
                $ruta->puntos()->attach($value);
            }


            return ApiResponse::success('Ruta creada', 200, $ruta);
        } catch (Exception $e) {
            return ApiResponse::error($e->getMessage(), 422);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruta $ruta)
    {
        try {
            return ApiResponse::success("Datos", 200, $ruta);
        } catch (Exception $e) {
            return ApiResponse::error($e->getMessage(), 422);
        } catch(ModelNotFoundException $E){
            return ApiResponse::error($E->getMessage(), 422);

        }
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
        try {
            $ruta->elete();

            return ApiResponse::success("Datos eliminados", 200);
        } catch (Exception $e) {
            return ApiResponse::error($e->getMessage(), 400);
        }

    }
}
