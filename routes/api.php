<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Ipv4s\Ipv4Controller;
use App\Http\Controllers\Logs\LogController;
use App\Http\Middleware\Log;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::middleware(['auth:api', Log::class])->group(function() {
    Route::apiResource('ipv4', Ipv4Controller::class)->only([
        'index',
        'store',
        'show',
        'update',
    ]);
});

Route::middleware(['auth:api'])->group(function() {
    Route::apiResource('log', LogController::class)->only([
        'index',
        'show',
    ]);
});
