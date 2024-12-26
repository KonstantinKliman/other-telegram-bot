<?php

use App\Http\Controllers\Bot\FrontController;
use Illuminate\Support\Facades\Route;

Route::post('bot/webhook', [FrontController::class, '__invoke']);
