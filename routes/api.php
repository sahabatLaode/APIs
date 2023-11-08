<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ZakatController;
use App\Http\Controllers\Api\rekController;
use App\Http\Controllers\Api\InfaqFormController;
use App\Http\Controllers\Api\SedekahFormController;

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
;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/logout', [UserController::class, 'logout']);
});

Route::apiResource('zakat', ZakatController::class);
Route::apiResource('user', UserController::class);
Route::apiResource('infaq', InfaqFormController::class);
Route::apiResource('sedekah', SedekahFormController::class);
Route::post('rekening', [rekController::class, 'store'])->name('rekening.store');


