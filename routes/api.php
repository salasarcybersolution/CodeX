<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\webService;

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


Route::post('/login',[webService::class,'login']);
//User Profile Info
Route::get('/userProfile/{id}',[webService::class,'userProfile']);
Route::post('/updateUserProfile',[webService::class,'updateUserProfile']);
// Change Password
Route::post('/forgetPassword',[webService::class,'forgetPassword']);
Route::post('/checkOtp',[webService::class,'checkOtp']);
Route::post('/updatePassword',[webService::class,'updatePassword']);
 