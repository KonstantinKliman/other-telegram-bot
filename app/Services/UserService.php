<?php

namespace App\Services;

use App\DTO\LoginUserDTO;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface
{
    public function login(LoginUserDTO $loginUserDTO)
    {
        $isAuth = Auth::attempt([
            'login' => $loginUserDTO->login,
            'password' => $loginUserDTO->password
        ]);

        if (!$isAuth) {
            return redirect()->back()->withErrors([
                'error' => 'Incorrect credentials'
            ]);
        }

        return redirect()->route('index');
    }
}
