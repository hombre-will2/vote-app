<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\NeonAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Neon Auth routes
Route::post('/auth/signup', [NeonAuthController::class, 'signup']);
Route::post('/auth/login', [NeonAuthController::class, 'login']);
Route::post('/auth/logout', [NeonAuthController::class, 'logout']);
Route::get('/auth/me', [NeonAuthController::class, 'me']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
