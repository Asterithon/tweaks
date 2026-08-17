<?php

use App\Http\Controllers\TweakController;
use App\Http\Controllers\auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\Login;

Route::get('/', [TweakController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::post('/tweaks', [TweakController::class, 'store']);
    Route::get('/tweaks/{tweak}/edit', [TweakController::class, 'edit']);
    Route::put('/tweaks/{tweak}', [TweakController::class, 'update']);
    Route::delete('/tweaks/{tweak}', [TweakController::class, 'destroy']);
});

Route::view('/register', 'auth.register')
    ->Middleware('guest')
    ->name('register');

Route::post('/register', Register::class)
    ->Middleware('guest');

Route::post('/logout', [App\Http\Controllers\auth\Logout::class, '__invoke'])
    ->Middleware('auth')
    ->name('logout');

Route::view('/login', 'auth.login')
    ->Middleware('guest')
    ->name('login');

Route::post('/login', Login::class)
    ->Middleware('guest');