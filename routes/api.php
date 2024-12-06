<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\UserController;
use App\Mail\UserMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('users',[UserController::class,'index']);
Route::post('user/store', [UserController::class,'store']);
Route::post('user/login', [UserController::class,'login']);
Route::get('user/show/{id}', [UserController::class,'show']);
Route::put('user/update/{id}', [UserController::class,'update']);

Route::get('user/logout', [UserController::class,'logout'])->middleware('auth:sanctum');
Route::post('user/recoverPassword', [SendMailController::class,'recoverPassword']);
Route::put('user/resetPassword', [UserController::class,'resetPassword']);
Route::post('user/userMessage', [SendMailController::class,'userMessage']);
// Route::group(['middleware'=>['auth:api']],function(){
//     Route::post('user/logout', 'Api\AuthController@logout');    
// });

