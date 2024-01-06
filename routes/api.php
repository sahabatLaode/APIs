<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\driverController;
use App\Http\Controllers\Api\ZakatController;
use App\Http\Controllers\Api\rekController;
use App\Http\Controllers\Api\InfaqFormController;
use App\Http\Controllers\Api\PermintaanController;
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
<<<<<<< HEAD
Route::put('/update-password/{id}', [UserController::class, 'updatePassword']);
// Route::post('/registrasi1', [driverController::class, 'register']);
// Route::post('/login1', [driverController::class, 'login']);

Route::put('/user/data/{id}', [UserController::class, 'updateUserData']);
Route::put('/user/password/{id}', [UserController::class, 'updateUserPassword']);
=======
;
>>>>>>> 9a3c2054952480228fcf6f753e4ab878c7b90e33

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/logout', [UserController::class, 'logout']);
    // Route::get('/logout1', [driverController::class, 'logout']);
});

Route::apiResource('zakat', ZakatController::class);
<<<<<<< HEAD
Route::apiResource('ambulan', PermintaanController::class);
Route::apiResource('user', UserController::class);
Route::apiResource('driver', driverController::class);
Route::apiResource('infaq', InfaqFormController::class);
Route::apiResource('sedekah', SedekahFormController::class);
Route::apiResource('koin', KoinSurgaController::class);
=======
Route::apiResource('user', UserController::class);
Route::apiResource('infaq', InfaqFormController::class);
Route::apiResource('sedekah', SedekahFormController::class);
>>>>>>> 9a3c2054952480228fcf6f753e4ab878c7b90e33
Route::post('rekening', [rekController::class, 'store'])->name('rekening.store');


