<?php

namespace App\Console\Commands;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateAdminCommand extends Command
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    )
    {
        parent::__construct();
    }

    protected $signature = 'admin:create';

    protected $description = 'Create admin user';

    public function handle()
    {
        $login = $this->ask('Enter login');
        $password = Str::random();

        $this->userRepository->create($login, Hash::make($password));

        $this->info("User successfully create:\n\nLogin:$login\nPassword:$password");
    }
}
