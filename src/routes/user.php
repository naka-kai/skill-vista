<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\User\Auth\ForgotPasswordController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\PasswordController;
use App\Http\Controllers\User\Auth\ResetPasswordController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\RegisterController;

// ユーザー
// 認証不要
Route::prefix('user')->name('user.')->group(function() {
    // ログイン
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    // 登録
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('showRegistrationForm');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    // パスワードリセット
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
});

// ログイン後
Route::middleware('auth:user')->group(function() {
    Route::post('/top', [TopController::class, 'top']);
});
Route::middleware('auth:user')->prefix('user')->name('user.')->group(function() {
    // ログアウト
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    // マイコース
    Route::get('/{userName}/my-course', [UserController::class, 'myCourse'])->name('myCourse');
    // 欲しいものリスト
    Route::get('/{userName}/wish-list', [UserController::class, 'wishList'])->name('wishList');
    // プロフィール
    Route::prefix('profile')->name('profile.')->group(function() {
        Route::get('/password-complete', [ProfileController::class, 'passwordComp'])->name('passwordComp');
        Route::get('/{userName}', [ProfileController::class, 'show'])->name('show');
        Route::put('/{userName}', [ProfileController::class, 'update'])->name('update');
    });
    // メールアドレス変更
    Route::prefix('email')->name('email.')->group(function() {
        Route::post('/change', [ProfileController::class, 'sendChangeEmailLink'])->name('sendChangeEmailLink');
        Route::get('/reset/{token}', [ProfileController::class, 'reset'])->name('reset');
    });
});