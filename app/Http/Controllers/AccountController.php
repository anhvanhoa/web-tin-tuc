<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Http\Requests\ChangePassRequest;
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
            return redirect()->route('me')->with('success', 'Cập nhật thông tin thành công');
        } catch (\Throwable $th) {
            Log::error($th);
            return back()->with('error', $th->getMessage());
        }
    }

    public function changePass(ChangePassRequest $request)
    {
        try {
            $this->accountService->changePass($request);
            return redirect()->route('me')->with('success', 'Đổi mật khẩu thành công');
        } catch (\Throwable $th) {
            Log::error($th);
            return back()->with('error', $th->getMessage());
        }
    }

    public function changePassView()
    {
        $data = $this->accountService->profile();
        return view('change-pass', $data);
    }
}
