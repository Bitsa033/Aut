<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('find_all_users', [UserController::class, 'index']);
// Route::post('save_new_user', [UserController::class, 'store']);
// Route::post('login', [UserController::class, 'login']);
// Route::get('find_user{id}', [UserController::class, 'show']);
// Route::put('update_user/{id}', [UserController::class, 'update']);
// Route::get('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
Route::post('passwordlResetLink', [SendMailController::class, 'passwordResetLink'])->name("passwordResetLink");
Route::get('passwordResetView', [UserController::class, 'passwordResetView'])->name("passwordResetView");
Route::post('passwordResetAction', [UserController::class, 'resetPassword'])->name("passwordResetAction");
Route::get('viewEmailForSendCode', [UserController::class, 'viewEmailForSendCode'])->name("viewEmailForSendCode");
Route::post('sendCodeEmailConfirmation', [SendMailController::class, 'sendCodeEmailConfirmation'])->name("sendCodeEmailConfirmation");
Route::get('verificationCodeView', [UserController::class, 'verificationCodeView'])->name("verificationCodeView");
Route::post('verificationCodeAction', [UserController::class, 'verificationCodeAction'])->name("verificationCodeAction");
// Route::group(['middleware'=>['auth:api']],function(){
//     Route::post('user/logout', 'Api\AuthController@logout');    
// });
