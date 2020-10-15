<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuctionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('auction', AuctionsController::class);

Route::post('get_states', [WebController::class, 'getStates'])->name('getStates');
Route::post('get_cities', [WebController::class, 'getCities'])->name('getCities');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', [WebController::class,'dashboard'])->name('dashboard');
    Route::get('/userslist', [WebController::class,'userslist'])->name('userslist');
});


