<?php

use App\Http\Controllers\athentificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [athentificationController::class , 'register']);
Route::post('login', [athentificationController::class , 'login']);

Route::group(['middleware' => ['auth:sanctum']] ,function() {
    Route::post('users', [athentificationController::class , 'get_users']);
    Route::get('profile', [athentificationController::class , 'profile']);
    Route::get('log_out', [athentificationController::class , 'log_out']);

});
