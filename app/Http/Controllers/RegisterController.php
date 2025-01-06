<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected RegisterService $registerService;

    function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function store(Request $request)
    {
        return $this->registerService->register($request);
    }
}
