<?php

namespace App\Http\Controllers\Admin;

use App\DTO\LoginUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Interfaces\UserServiceInterface;

class AuthController extends Controller
{
    public function __construct(
        private readonly UserServiceInterface $userService
    )
    {
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        return $this->userService->login(new LoginUserDTO($request->validated('login'), $request->validated('password')));
    }
}
