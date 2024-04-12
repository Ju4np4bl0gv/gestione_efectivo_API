<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Cuadre;
use Exception;
use Illuminate\Http\Request;

class CuadreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return ApiResponse::success("datos", 200, Cuadre::all());
        } catch (Exception $e) {
            return ApiResponse::error($e->getMessage(), 420);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
         //   return $request->all();

            $request->validate([
                'asesora_doc' => 'required',
                'punto_cod' => 'required|exists:puntos,cod_punto',
                'turno' => 'required'
            ]);
            

            $cuadre= Cuadre::create($request->all());
            return ApiResponse::success("Cuadre creado",200, $cuadre );
        } catch (Exception $e) {
            return ApiResponse::error($e->getMessage(), 420);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuadre $cuadre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuadre $cuadre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuadre $cuadre)
    {
        //
    }
}
