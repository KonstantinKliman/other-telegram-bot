<?php

namespace App\DTO;

final readonly class LoginUserDTO
{
    public function __construct(
        public string $login,
        public string $password
    )
    {
    }
}
