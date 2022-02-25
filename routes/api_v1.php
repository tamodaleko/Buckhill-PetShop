<?php

use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Api V1 Routes
|--------------------------------------------------------------------------
*/

// User Endpoints
Route::group(['prefix' => 'user'], function() {
    Route::post('/login', [UserController::class, 'login'])->name('user.login');
});
