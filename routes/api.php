<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\FileAttachmentController;
use App\Http\Controllers\GeolocationController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('login', [AuthController::class,'login']);
// Route::group(['prefix'=>'auth','middleware'=>'auth:sanctum'],function () {
//     Route::post('logout', [AuthController::class,'logout']);
//     Route::post('logoutall', [AuthController::class,'logoutall']);
// });
Route::post('login/verification',[AuthController::class,'formLogin']);
Route::get('user/contract/get',[ContractController::class,'getContract']);
Route::post('user/contract/upload/attachment', [FileAttachmentController::class,'store']);
// costume geolocation coordinate
Route::post('geolocation/costume/coordinate',[GeolocationController::class,'costumeLogLnt']);
