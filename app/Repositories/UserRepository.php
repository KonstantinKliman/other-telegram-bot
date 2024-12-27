<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function create(string $login, string $password) : User
    {
        return User::query()->create([
            'login' => $login,
            'password' => $password
        ]);
    }
}
