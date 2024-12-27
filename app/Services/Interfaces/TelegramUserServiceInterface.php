<?php

namespace App\Services\Interfaces;

use SergiX44\Nutgram\Telegram\Types\User\User;

interface TelegramUserServiceInterface
{
    public function firstOrCreate(?User $user);

    public function getAllPaginatedUsers();

    public function setUserDataFromMessage(?User $telegramUser, string $userMessage);
}
