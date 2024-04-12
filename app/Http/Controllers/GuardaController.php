<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Guarda;
use Exception;
use Illuminate\Http\Request;

class GuardaController extends Controller
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
                'nombre' => 'required',
                'documento' => 'required|unique:guardas'
            ]);

            $guarda = Guarda::create($request->all());
            return ApiResponse::success('registro agregado', 201, $guarda);
        } catch (Exception $e) {
            return ApiResponse::error($e->getMessage(), 422);

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Guarda $guarda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guarda $guarda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guarda $guarda)
    {
        //
    }
}
