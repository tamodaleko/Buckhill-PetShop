<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::any('{path}', function() {
    return response()->json([
        'message' => 'Page not found.'
    ], 404);
})->where('path', '.*');
