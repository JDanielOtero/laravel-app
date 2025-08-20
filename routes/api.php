<?php

use App\Http\Controllers\Api\AcPaymentOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LgRequirementController;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('logout', [AuthController::class, 'logout']);

    // Route::get('mine-table-rqf', [AcPaymentOrderController::class, 'index']);

});

Route::get('mine-table-rqf', [AcPaymentOrderController::class, 'index']);
Route::get('/lg-requirements', [LgRequirementController::class, 'index']);

Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');
