<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Api V1 Routes
|--------------------------------------------------------------------------
*/

// Auth Endpoints
Route::post('/login', [AuthController::class, 'login']);
