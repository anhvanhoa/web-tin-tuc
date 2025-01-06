<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\UserService;

class LoginController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    // login
    public function login(LoginRequest $request)
    {
        return $this->userService->login($request);
    }
}
