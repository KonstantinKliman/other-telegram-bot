<?php

use Illuminate\Support\Facades\Route;

Route::post('bot/webhook', [\App\Http\Controllers\Bot\FrontController::class, '__invoke']);
