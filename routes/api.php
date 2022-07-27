<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/get-data/save/{suhu_object}/{suhu_lingkungan}/{konsentrasi_ozon}', [Controllers\APIController::class, 'getData']);
Route::get('/tes', [Controllers\APIController::class, 'tes']);
Route::get('/switch/{stat}', [Controllers\APIController::class, 'getSwitch']);
Route::get('/fan/{stat}', [Controllers\APIController::class, 'getFan']);
