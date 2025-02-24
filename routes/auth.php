<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', function () {
    return view('auth.register');
});
Route::post('/register', [AuthController::class, 'register']);

// Rota para exibir o formulário de login (método GET)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Rota para processar o login (método POST)
Route::post('/login', [AuthController::class, 'login']);
