<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function create(string $login, string $password);
}
