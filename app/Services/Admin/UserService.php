<?php

namespace App\Services\Admin;

use App\Http\Middleware\RoleMiddleware;
use App\Http\Requests\Admin\UserRequest;
use App\Repositories\UserRepository;
use App\Services\MediaService;
use Illuminate\Support\Facades\Log;

class UserService
{
    protected $userRepository;
    protected $mediaService;

    public function __construct(UserRepository $userRepository, MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
        $this->userRepository = $userRepository;
    }

    public function getUsers()
    {
        $users = $this->userRepository->all();
        return [
            'users' => $users
        ];
    }

    public function getUser($id)
    {
        $user = $this->userRepository->getById($id);
        return [
            'user' => $user
        ];
    }

    public function updateUser(UserRequest $request, $id)
    {
        $data = $request->validated();

        // get user to update
        $userToUpdate = $this->userRepository->getById($id);

        if (!$userToUpdate) {
            throw new \Exception('Người dùng không tồn tại.');
        }
        // Check if the user to update is the admin
        $adminMail = config('app.admin_mail');
        if ($userToUpdate->email == $adminMail && auth()->user()->email != $adminMail) {
            throw new \Exception('Bạn không thể cập nhật của tài khoản này.');
        }

        // if the user is not the admin, check if the user to update is the admin
        if ($userToUpdate->email == $adminMail && auth()->user()->email == $adminMail) {
            unset($data['roles']);
            unset($data['status']);
        }

        // handle avatar
        if ($request->hasFile('avatar')) {
            $folder = auth()->user()->id;
            $data['avatar'] = $this->mediaService->upload($request->file('avatar'), $folder);
        } else {
            unset($data['avatar']);
        }

        return $this->userRepository->updateUser($id, $data);
    }
}
