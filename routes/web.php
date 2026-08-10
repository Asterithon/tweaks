<?php

use App\Http\Controllers\TweakController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TweakController::class, 'index']);
