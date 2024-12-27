<?php

namespace App\Telegram\Middleware;

use App\Services\Interfaces\TelegramUserServiceInterface;
use SergiX44\Nutgram\Nutgram;

class CheckUserMiddleware
{
    public function __construct(
        private readonly TelegramUserServiceInterface $telegramUserService
    )
    {
    }

    public function __invoke(Nutgram $bot, $next): void
    {
        $this->telegramUserService->firstOrCreate($bot->user());

        $next($bot);
    }
}
