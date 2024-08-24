<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SalatTimeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix("salat-time")->group(function () {
    Route::get('/list',     [SalatTimeController::class, 'index']);
    Route::get('/show',     [SalatTimeController::class, 'show']);
    Route::post('/store',   [SalatTimeController::class, 'store']);
    Route::post('/update',  [SalatTimeController::class, 'update']);
    Route::post('/delete',  [SalatTimeController::class, 'delete']);
});