<?php
namespace App\Services;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function store(RegisterRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ];
            $data['password'] = Hash::make($data['password']);
            return $this->userRepository->createUser($data);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Internal server error'], 500);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $user = $this->userRepository->findUser($request->email);
            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }
            if (Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Login success'], 200);
            }
            return response()->json(['message' => 'Password not match'], 401);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Internal server error'], 500);
        }
    }
}
