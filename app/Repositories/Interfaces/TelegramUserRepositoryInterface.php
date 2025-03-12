<?php

namespace App\Repositories\Interfaces;

use App\Models\TelegramUser;
use SergiX44\Nutgram\Telegram\Types\User\User;

interface TelegramUserRepositoryInterface
{
    public function firstOrCreate(int $chatId, ?string $username, string $firstName, ?string $lastName) : TelegramUser;

    public function getAllPaginatedUsers();

    public function setUserDataFromMessage(?User $telegramUser, string $userMessage);
}
