<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.action');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\PageController::class, 'index'])->name('index');
    Route::post('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('auth.logout');

    Route::prefix('telegram-users')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\TelegramUserController::class, 'index'])->name('telegram-users.index');
    });

    Route::prefix('telegram-bot')->group(function () {
        Route::prefix('buttons')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ButtonController::class, 'index'])->name('telegram-bot.buttons.index');
            Route::get('/create', [\App\Http\Controllers\Admin\ButtonController::class, 'create'])->name('telegram-bot.buttons.create');
            Route::post('/store', [\App\Http\Controllers\Admin\ButtonController::class, 'store'])->name('telegram-bot.buttons.store');
            Route::post('/{id}', [\App\Http\Controllers\Admin\ButtonController::class, 'update'])->name('telegram-bot.buttons.update');
        });
        Route::prefix('messages')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('telegram-bot.messages.index');
            Route::get('/create', [\App\Http\Controllers\Admin\MessageController::class, 'create'])->name('telegram-bot.messages.create');
            Route::post('/create', [\App\Http\Controllers\Admin\MessageController::class, 'store'])->name('telegram-bot.messages.store');
            Route::post('/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'update'])->name('telegram-bot.messages.update');
            Route::post('/{id}/delete', [\App\Http\Controllers\Admin\MessageController::class, 'delete'])->name('telegram-bot.messages.delete');
            Route::prefix('{messageId}/files')->group(function () {
                Route::get('/create', [\App\Http\Controllers\Admin\FileController::class, 'create'])->name('telegram-bot.files.create');
                Route::post('/create', [\App\Http\Controllers\Admin\FileController::class, 'store'])->name('telegram-bot.files.store');
                Route::post('/{fileId}/delete', [\App\Http\Controllers\Admin\FileController::class, 'delete'])->name('telegram-bot.files.delete');
            });
        });

    });
});

