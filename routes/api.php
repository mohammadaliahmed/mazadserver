<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\UserController;
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
Route::post('uploadFile', [FileUploadController::class,'uploadFile']);


Route::group(['prefix' => 'user'], function () {

    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
    Route::post('getUserData', [UserController::class, 'getUserData']);
    Route::post('updateFcmKey', [UserController::class, 'updateFcmKey']);
    Route::post('completeProfile', 'App\Http\Controllers\UserController@completeProfile');


});