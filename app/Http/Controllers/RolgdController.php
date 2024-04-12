<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Rolgd;
use Exception;
use Illuminate\Http\Request;

class RolgdController extends Controller
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
                'creado_por' => 'required',
                'nombre_rol' => 'required|unique:rolgds'
            ]);
            $rolgd = Rolgd::create($request->all());
            return ApiResponse::success('registro agregado', 201, $rolgd);
        } catch (Exception $e) {
            return ApiResponse::error($e->getMessage(), 422);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Rolgd $rolgd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rolgd $rolgd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rolgd $rolgd)
    {
        //
    }
}
