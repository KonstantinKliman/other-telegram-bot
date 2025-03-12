<?php

namespace App\Services;

use App\Models\TelegramUser;
use App\Repositories\Interfaces\TelegramUserRepositoryInterface;
use App\Services\Interfaces\TelegramUserServiceInterface;
use SergiX44\Nutgram\Telegram\Types\User\User;

class TelegramUserService implements TelegramUserServiceInterface
{
    public function __construct(
        private readonly TelegramUserRepositoryInterface $telegramUserRepository
    )
    {
    }

    public function firstOrCreate(?User $user) : TelegramUser
    {
        return $this->telegramUserRepository->firstOrCreate(
            $user->id,
            $user->username ?? null,
            $user->first_name,
            $user->last_name ?? null
        );
    }

    public function getAllPaginatedUsers()
    {
        return $this->telegramUserRepository->getAllPaginatedUsers();
    }

    public function setUserDataFromMessage(?User $telegramUser, string $userMessage)
    {
        $telegramUser = $this->telegramUserRepository->setUserDataFromMessage($telegramUser, $userMessage);
    }
}
