<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Services\AccountService;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{

    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function edit()
    {
        $data = $this->accountService->profile();
        return view('account', $data);
    }

    public function update(AccountRequest $request)
    {
        try {
            $this->accountService->updateProfile($request);
            return redirect()->route('me');
        } catch (\Throwable $th) {
            Log::error($th);
            return back()->with('error', $th->getMessage());
        }
    }
}
