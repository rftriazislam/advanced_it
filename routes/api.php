<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GetController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/classes', [GetController::class,'classes']);

Route::post('/signup', [AuthController::class,'signup']);

Route::post('/signin', [AuthController::class,'signin']);

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/schedules', [GetController::class,'schedules']);

    Route::get('/study/materials', [GetController::class,'materials']);

    Route::get('/assignments', [GetController::class,'assignments']);

    Route::get('/attendances', [GetController::class,'attendances']);
    Route::get('/notices', [GetController::class,'notices']);
});
