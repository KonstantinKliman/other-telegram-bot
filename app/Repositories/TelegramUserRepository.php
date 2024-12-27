<?php

namespace App\Repositories;

use App\Models\TelegramUser;
use App\Repositories\Interfaces\TelegramUserRepositoryInterface;
use SergiX44\Nutgram\Telegram\Types\User\User;

class TelegramUserRepository implements TelegramUserRepositoryInterface
{

    public function firstOrCreate(int $chatId, string $username, string $firstName, ?string $lastName) : TelegramUser
    {
        return TelegramUser::query()->firstOrCreate([
            'chat_id' => $chatId
        ], [
            'username' => $username,
            'first_name' => $firstName,
            'last_name' => $lastName
        ]);
    }

    public function getAllPaginatedUsers()
    {
        return TelegramUser::query()->orderBy('created_at', 'desc')->paginate(15);
    }

    public function setUserDataFromMessage(?User $telegramUser, string $userMessage) : void
    {
        $telegramUser = TelegramUser::query()->where([
            'chat_id' => $telegramUser->id
        ])->first();

        $telegramUser->userData()->create([
            'data' => $userMessage
        ]);
    }
}
