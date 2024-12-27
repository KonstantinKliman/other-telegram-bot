<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Telegram\Commands\StartCommand;
use App\Telegram\Middleware\CheckUserMiddleware;
use SergiX44\Nutgram\Nutgram;

/*
|--------------------------------------------------------------------------
| Nutgram Handlers
|--------------------------------------------------------------------------
|
| Here is where you can register telegram handlers for Nutgram. These
| handlers are loaded by the NutgramServiceProvider. Enjoy!
|
*/

$bot->onCommand('start', StartCommand::class)
    ->description('The start command!')
    ->middleware(CheckUserMiddleware::class);
