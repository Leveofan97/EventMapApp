<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterEvent;
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

Route::group([
    'prefix' => 'user',
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('registration',[RegisterController::class, 'save']);
    Route::post('newevent',[RegisterEvent::class, 'save']);

    Route::group([
        'middleware' => ['auth:web'],
    ], function () {
        // Route::put('profile', [ProfileController::class, 'update']);

        // Route::resources([
        // 'orders' => OrderController::class,
        // ]);
    });
});
