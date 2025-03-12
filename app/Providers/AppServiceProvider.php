<?php

namespace App\Providers;

use App\Services\ButtonService;
use App\Services\FileService;
use App\Services\Interfaces\ButtonServiceInterface;
use App\Services\Interfaces\FileServiceInterface;
use App\Services\Interfaces\MessageServiceInterface;
use App\Services\Interfaces\TelegramUserServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\MessageService;
use App\Services\TelegramUserService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(TelegramUserServiceInterface::class, TelegramUserService::class);
        $this->app->bind(MessageServiceInterface::class, MessageService::class);
        $this->app->bind(ButtonServiceInterface::class, ButtonService::class);
        $this->app->bind(FileServiceInterface::class, FileService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
