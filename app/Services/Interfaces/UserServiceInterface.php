<?php

namespace App\Services\Interfaces;

use App\DTO\LoginUserDTO;

interface UserServiceInterface
{

    public function login(LoginUserDTO $loginUserDTO);
}
