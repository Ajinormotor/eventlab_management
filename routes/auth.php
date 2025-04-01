<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\EmailController;
use App\Http\Controllers\Auth\PasswordAuthenticate;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;




Route::middleware(['guest'])->group( function(){

Route::get('register', [RegisterController::class, 'registerIndex'])
    ->name('register');

    Route::post('register', [RegisterController::class, 'registerStore'])
    ->name('register');

    
Route::get('login', [AuthenticateController::class, 'loginIndex'])
->name('login');

Route::post('login', [AuthenticateController::class, 'loginStore'])
->name('login');

// Forgot password

Route::get('forgot-password', [PasswordAuthenticate::class, 'forgotIndex'])
->name('password.notice');

Route::post('forgot-password', [PasswordAuthenticate::class, 'forgotStore'])
->name('password.email');

// Reset password

Route::get('reset-password/{token}', [PasswordAuthenticate::class, 'resetIndex'])
->name('password.reset');

Route::post('reset-password', [PasswordAuthenticate::class, 'resetStore'])
->name('password.post');


});


Route::middleware(['auth'])->group( function(){

Route::post('logout', [AuthenticateController::class, 'logout'])
->name('logout');


// Email Verification

Route::get('email/verify', [EmailController::class, 'emailIndex'])
->name('verification.notice');

Route::post('email/verification-notification', [EmailController::class, 'emailStore'])
->middleware(['throttle:6,1'])->name('verification.send');

Route::get('email/verify/{id}/{hash}', [EmailController::class, 'emailShow'])
->middleware(['signed'])->name('verification.verify');


});