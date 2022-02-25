<?php

use App\Http\Controllers\Api\V1\BrandController;
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

// Brand Endpoints
Route::group(['prefix' => 'brand'], function() {
    Route::post('/create', [BrandController::class, 'create'])->name('brand.create');
});
