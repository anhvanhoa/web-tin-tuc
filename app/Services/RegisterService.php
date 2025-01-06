<?php

namespace App\Services;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ], [
                'name.required' => 'Name is required',
                'name.string' => 'Name must be a string',
                'name.max' => 'Name must not be greater than 255 characters',
                'email.required' => 'Email is required',
                'email.string' => 'Email must be a string',
                'email.email' => 'Email must be a valid email',
                'email.max' => 'Email must not be greater than 255 characters',
                'email.unique' => 'Email must be unique',
                'password.required' => 'Password is required',
                'password.string' => 'Password must be a string',
                'password.min' => 'Password must not be less than 8 characters',
                'password.confirmed' => 'Password confirmation does not match',
            ]);
    
            return $this->userRepository->createUser($request->all());  
    
        } catch (ValidationException $e) {
            // Trả về lỗi validation dưới dạng JSON
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Throwable $th) {
            // Bắt các lỗi khác (nếu có)
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
