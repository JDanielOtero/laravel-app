<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RefreshRequest;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if (! $token = Auth::guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Credenciales inválidas',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login exitoso',
            'data' => [
                'access_token' => $token,
                'token_type'   => 'bearer',
                'expires_in'   => JWTAuth::factory()->getTTL() * 60, // por defecto 60 min
                // refresh token lo veremos luego
            ]
        ], 200);
    }

    public function refresh(RefreshRequest $request): JsonResponse
    {
        try {
            $refreshToken = $request->input('refresh_token');

            $newToken = JWTAuth::setToken($refreshToken)->refresh();

            return response()->json([
                'success' => true,
                'message' => 'Token renovado',
                'data' => [
                    'access_token' => $newToken,
                    'token_type'   => 'bearer',
                    'expires_in'   => JWTAuth::factory()->getTTL() * 60,
                ],
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'El refresh token no es válido o expiró',
                'error'   => $e->getMessage(),
            ], 401);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'success' => true,
                'message' => 'Sesión cerrada correctamente',
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo cerrar sesión',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
