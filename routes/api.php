<?php

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
Route::post('/register', [\App\Http\Controllers\Api\AuthController::class,'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class,'login']);
//Route::post('login', [\App\Http\Controllers\API\APIController::class, 'login']);
//Route::get('notice',[\App\Http\Controllers\API\APIController::class,'notice']);
//Route::Post('notice_save',[\App\Http\Controllers\API\APIController::class,'notice_save']);
