<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\TelegramUserServiceInterface;

class TelegramUserController extends Controller
{
    public function __construct(
        private readonly TelegramUserServiceInterface $telegramUserService
    )
    {
    }

    public function index()
    {
        return view('admin.telegram-users.index', [
            'users' => $this->telegramUserService->getAllPaginatedUsers()
        ]);
    }
}
