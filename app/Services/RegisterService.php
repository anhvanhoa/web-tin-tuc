<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function register(RegisterRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ];
            $data['password'] = Hash::make($data['password']);
            $this->userRepository->create($data);
            return redirect()->route('auth.login.view')->with('success-register', 'Đăng ký thành công');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
