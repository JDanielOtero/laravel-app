<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LgRequirementController;
use App\Http\Controllers\Api\AcPaymentOrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});

Route::middleware(['auth:api'])->group(function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    Route::get('mine-table-rqf', [AcPaymentOrderController::class, 'index']);
    Route::get('/lg-requirements', [LgRequirementController::class, 'index']);
});
