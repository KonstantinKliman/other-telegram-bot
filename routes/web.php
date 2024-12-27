<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.action');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\PageController::class, 'index'])->name('index');
    Route::post('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('auth.logout');

    Route::prefix('telegram-users')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\TelegramUserController::class, 'index'])->name('telegram-users.index');
    });

    Route::prefix('telegram-bot')->group(function () {
        Route::prefix('buttons')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ButtonController::class, 'index'])->name('telegram-bot.buttons.index');
        });
        Route::prefix('messages')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('telegram-bot.messages.index');
            Route::post('/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'update'])->name('telegram-bot.messages.update');
        });
    });
});

