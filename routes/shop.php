<?php

use App\Http\Controllers\Shop\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Shop\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Shop\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Shop\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Shop\Auth\NewPasswordController;
use App\Http\Controllers\Shop\Auth\PasswordResetLinkController;
use App\Http\Controllers\Shop\Auth\RegisteredUserController;
use App\Http\Controllers\Shop\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

//Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->middleware('guest:shop')
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest:shop');

    Route::get('/shop/login', [AuthenticatedSessionController::class, 'create'])
        ->name('shop.login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:shop');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest:shop')
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest:shop')
        ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->middleware('guest:shop')
        ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest:shop')
        ->name('password.update');
    
//});

//Route::middleware('auth')->group(function () {
    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                    ->middleware('auth:shop')
                    ->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                    ->middleware(['auth', 'signed', 'throttle:6,1'])
                    ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                    ->middleware(['auth', 'throttle:6,1'])
                    ->name('verification.send');

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                    ->middleware('auth:shop')
                    ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                    ->middleware('auth:shop');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                    ->middleware('auth:shop')
                    ->name('logout');
//});
