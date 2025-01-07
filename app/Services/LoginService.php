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
        try {
            $credentials = $request->validated();
            if (Auth::attempt($credentials, $request->remember)) {
                $request->session()->regenerate();
                return redirect()->route('home');
            }
            return back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
