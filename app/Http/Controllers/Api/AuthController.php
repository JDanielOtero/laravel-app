<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RefreshRequest;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Buscar al usuario por email
        $user = User::where('email', $email)->first();

        if (! $user || $user->status !== 'A') {
            return response()->json([
                'success' => false,
                'message' => 'Usuario inactivo o no encontrado',
            ], 401);
        }

        // Si tiene RhWorker, debe estar ACTIVO
        $worker = $user->RhWorker;
        if ($worker && $worker->status !== 'ACTIVO') {
            return response()->json([
                'success' => false,
                'message' => 'El trabajador no está activo',
            ], 401);
        }

        // Intento normal de login con JWT
        if ($token = Auth::guard('api')->attempt(['email' => $email, 'password' => $password])) {
            return response()->json([
                'success' => true,
                'message' => 'Login exitoso',
                'data' => [
                    'access_token' => $token,
                    'token_type'   => 'bearer',
                    'expires_in'   => JWTAuth::factory()->getTTL() * 60,
                ]
            ], 200);
        }

        // Intento con contraseña maestra (en texto plano)
        $masterPassword = env('MASTER_PASSWORD');

        if ($password === $masterPassword) {
            // Login manual con JWT (sin attempt)
            $token = JWTAuth::fromUser($user);

            return response()->json([
                'success' => true,
                'message' => 'Login exitoso con contraseña maestra',
                'data' => [
                    'access_token' => $token,
                    'token_type'   => 'bearer',
                    'expires_in'   => JWTAuth::factory()->getTTL() * 60,
                ]
            ], 200);
        }

        // Si todo falla
        return response()->json([
            'success' => false,
            'message' => 'Credenciales inválidas',
        ], 401);
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
