<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\User\AuthController;
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

Route::group(['prefix' => 'user'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('registration',[RegisterController::class, 'create']);
    Route::get('listevents',[EventController::class, 'index']);
    Route::get('getcategories',[EventController::class, 'getCategory']);

    Route::group([
        'middleware' => ['auth:sanctum'],
    ], function () {
        Route::post('newevent',[EventController::class, 'save']);
    });
});
