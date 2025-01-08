<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $data = $this->userService->getUsers();
        return view('admin.user.index', $data);
    }

    public function edit($id)
    {
        $data = $this->userService->getUser($id);
        return view('admin.user.edit', $data);
    }

    public function update(UserRequest $request, string $id)
    {
        try {
            $this->userService->updateUser($request, $id);
            return redirect()->back()->with('success', 'Cập nhật người dùng thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}
