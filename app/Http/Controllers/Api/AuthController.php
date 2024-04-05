<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registrar(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed'
            ]);
            //alta del usuario

            // return $request->all();
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]);

            return ApiResponse::success("Registrado", 201, $user);
        } catch (\Throwable $th) {
            return ApiResponse::error("Error al registarse", 402);
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                $token = $user->createToken('token', ['server:update'])->plainTextToken;

                $cookie = cookie('cookie_token', $token, 60 * 24);
                return ApiResponse::success("login exitoso", 200, $token)->withoutCookie($cookie);
                // return response(["token" => $token], Response::HTTP_OK)->withoutCookie($cookie);
            } else {
                return ApiResponse::error("No autorizado", 400);
                // return response(["message" => "Credenciales inválidas"], Response::HTTP_UNAUTHORIZED);
            }
        } catch (\Throwable $th) {
            return ApiResponse::error("error", 400);
        }
    }

    public function userProfile(Request $request)
    {
        try {
            return ApiResponse::success("autorizado", 400, auth()->user());
        } catch (\Throwable $th) {
            return ApiResponse::error("error", 400);
        }
    }

    public function logout(Request $request)
    {

        try {

          

            $request->user()->tokens()->delete();
            $cookie = Cookie::forget('cookie_token');
            return ApiResponse::success("Cierre de sesión OK", 200, $cookie)->withCookie($cookie);
        } catch (\Throwable $th) {
            return ApiResponse::error("error", 400);
        }
    }
    /*
    public function allUsers()
    {
        $users = User::all();
        return response()->json([
            "users" => $users
        ]);
    }*/
}
