<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\LoginService;

class LoginController extends Controller
{
    protected $loginService;
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    // login view
    public function create()
    {
        return view('auth.login');
    }

    // login
    public function store(LoginRequest $request)
    {
        try {
            $this->loginService->login($request);
            return redirect()->route('home');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
