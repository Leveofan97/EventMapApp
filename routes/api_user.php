<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

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
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', [JWTAuthController::class, 'register']);
    Route::post('login', [JWTAuthController::class, 'login']);
    Route::post('logout', [JWTAuthController::class, 'logout']);
    Route::post('refresh', [JWTAuthController::class, 'refresh']);
    Route::get('me', [JWTAuthController::class, 'me']);
    Route::get('google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'user'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('registration',[RegisterController::class, 'create']);
    Route::get('listevents',[EventController::class, 'index']);
    Route::get('getcategories',[EventController::class, 'getCategory']);
    Route::get('getmarks', [EventController::class,'getMarkers']);
    Route::get('search', [EventController::class,'search']);
    Route::post('newevent',[EventController::class, 'save']);
    Route::get('moderate', [EventController::class,'geteventsformoderate']);
    Route::get('delete', [EventController::class,'deleteEvent']);
    Route::get('activate', [EventController::class,'activateEvent']);
    Route::get('member', [EventController::class,'getmymemberevents']);
    Route::get('membercheck', [EventController::class,'eventmember']);
    Route::get('userauthor', [EventController::class,'eventorganize']);
    Route::get('memberdelete', [EventController::class,'removemember']);
    Route::get('datafilter', [EventController::class, 'dataFilter']);
    Route::post('refresh_data', [UserController::class, 'update']);
    Route::post('report', [EventController::class, 'report']);
    Route::get('getreports', [EventController::class, 'showreport']);
    //_____________________________________________________________//
});



