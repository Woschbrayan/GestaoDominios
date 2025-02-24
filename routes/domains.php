<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;

Route::middleware('auth')->group(function () {
    Route::get('/domains', [DomainController::class, 'index']);
    Route::get('/domains/create', [DomainController::class, 'create']);
    Route::post('/domains', [DomainController::class, 'store']);
    Route::get('/domains/{id}/edit', [DomainController::class, 'edit']);
    Route::put('/domains/{id}', [DomainController::class, 'update']);
    Route::delete('/domains/{id}', [DomainController::class, 'destroy']);
    Route::get('/domains/expired', [DomainController::class, 'expired']);
    Route::get('/domains/active', [DomainController::class, 'active']);
});
