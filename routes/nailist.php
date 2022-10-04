<?php

use App\Http\Controllers\Nailist\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Nailist\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Nailist\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Nailist\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Nailist\Auth\NewPasswordController;
use App\Http\Controllers\Nailist\Auth\PasswordResetLinkController;
use App\Http\Controllers\Nailist\Auth\RegisteredUserController;
use App\Http\Controllers\Nailist\Auth\RegisteredNailistController;
use App\Http\Controllers\Nailist\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NailController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
    ->middleware('guest:nailist')
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);
    // ->middleware('guest:nailist');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest:nailist')
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    // ->middleware('guest:nailist');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest:nailist')
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest:nailist')
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest:nailist')
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest:nailist')
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth:nailist')
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth','signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('auth','throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth:nailist')            
    ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth:nailist');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:nailist')            
    ->name('logout');
});

