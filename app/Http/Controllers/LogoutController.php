<?php

namespace App\Http\Controllers;

use App\Services\LogoutService;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    protected $logoutService;

    public function __construct(
        LogoutService $logoutService
    ) {
        $this->logoutService = $logoutService;
    }

    public function destroy(Request $request)
    {
        return $this->logoutService->logout($request);
    }
}
