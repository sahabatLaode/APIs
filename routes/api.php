<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\driverController;
use App\Http\Controllers\Api\ZakatController;
use App\Http\Controllers\Api\rekController;
use App\Http\Controllers\Api\InfaqFormController;
use App\Http\Controllers\Api\SedekahFormController;
use App\Http\Controllers\Api\KoinSurgaController;

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
Route::post('/registrasi', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/registrasi1', [driverController::class, 'register']);
Route::post('/login1', [driverController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/logout1', [driverController::class, 'logout']);
});

Route::apiResource('zakat', ZakatController::class);
Route::apiResource('user', UserController::class);
Route::apiResource('driver', driverController::class);
Route::apiResource('infaqform', InfaqFormController::class);
Route::apiResource('sedekahform', SedekahFormController::class);
Route::apiResource('koin', KoinSurgaController::class);
Route::post('rekening', [rekController::class, 'store'])->name('rekening.store');


