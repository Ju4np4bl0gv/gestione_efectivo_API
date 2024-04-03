<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Punto;
use Dotenv\Exception\ValidationException;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Punto::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'cod_punto' => 'required|unique:puntos',
                'nombre'    => 'required|unique:puntos'
            ]);

           $punto =  Punto::create($request->all());
          /*  $punto = new Punto;
            $punto->cod_punto = $request->cod_punto;
            $punto->nombre = $request->nombre;
            $punto->save();*/

            return ApiResponse::success('Registro agregado', 200, $punto);
        } catch (ValidationException $e) {
            return  ApiResponse::error($e->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Punto $punto)
    {
        try {
           return $punto;
           ApiResponse::success('Registro agregado', 200, $punto);
        } catch (ModelNotFoundException $e) {
            ApiResponse::error('Sucedio un error', 404);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Punto $punto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Punto $punto)
    {
        //
    }
}
