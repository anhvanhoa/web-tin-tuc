<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService;

class RegisterController extends Controller
{
    protected RegisterService $registerService;

    function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }
    
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        return $this->registerService->register($request);
    }
}
