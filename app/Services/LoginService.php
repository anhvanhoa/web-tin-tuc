<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        // Check if the user exists
        $user = $this->userRepository->getByEmail($credentials['email']);
        if (!$user) {
            throw new \Exception('Tài khoản hoặc mật khẩu không đúng');
        }

        // Check if the user is active
        if ($user->status != 'active') {
            throw new \Exception('Tài khoản chưa được kích hoạt');
        }

        // Check if the password is correct
        $isLogin = Auth::attempt($credentials, $request->remember);
        if (!$isLogin) {
            throw new \Exception('Tài khoản hoặc mật khẩu không đúng');
        }
        $request->session()->regenerate();
        return redirect()->route('home');
    }
}
