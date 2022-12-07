<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\PaymentController;




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


Route::middleware('auth:sanctum')->group(function (){
    Route::resource('room', RoomController::class)->except(
        ['create', 'edit','index','show']
    );

    Route::resource('reservasi', ReservasiController::class)->except(
        ['create', 'edit','index','show']
    );
    
    Route::resource('payment', PaymentController::class)->except(
        ['create', 'edit','index','show']
    );
    Route::post('/logout',[LoginController::class, 'logout']);
});
Route::get('/user/{id}',[LoginController::class, 'showuser']);
Route::post('/register',[LoginController::class, 'register']);
Route::get('/user',[LoginController::class, 'alluser']);
Route::post('/login',[LoginController::class, 'login']);

Route::get('room',[RoomController::class, 'index']);
Route::get('room/{id}',[RoomController::class, 'show']);

Route::get('reservasi',[ReservasiController::class, 'index']);
Route::get('reservasi/{id}',[ReservasiController::class, 'show']);

Route::get('payment',[PaymentController::class, 'index']);
Route::get('payment/{id}',[PaymentController::class, 'show']);
