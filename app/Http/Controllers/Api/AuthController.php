<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RefreshRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Login exitoso',
            'data' => [
                'access_token' => '...',
                'expires_in'   => 900,
                'refresh_token'=> '...',
            ],
        ], 200);
    }

    public function refresh(RefreshRequest $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Token renovado',
            'data' => [
                'access_token' => '...',
                'expires_in'   => 900,
            ],
        ], 200);
    }

    public function logout(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Sesión cerrada',
        ], 200);
    }
}
