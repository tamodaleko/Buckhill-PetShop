<?php

use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Api V1 Routes
|--------------------------------------------------------------------------
*/

// User Endpoints
Route::post('/user/login', [UserController::class, 'login']);
