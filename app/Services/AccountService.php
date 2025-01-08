<?php

namespace App\Services;

use App\Http\Requests\AccountRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\TagRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AccountService
{
    protected $userRepository;
    protected $categoryRepository;
    protected $tagRepository;
    protected $mediaService;

    public function __construct(
        UserRepository $userRepository,
        CategoryRepository $categoryRepository,
        TagRepository $tagRepository,
        MediaService $mediaService
    ) {
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        $this->mediaService = $mediaService;
    }

    public function profile()
    {
        $categories = $this->categoryRepository->allCategories();
        $tags = $this->tagRepository->allTags();
        $user = $this->userRepository->getByEmail(Auth::user()->email);
        return [
            'user' => $user,
            'categories' => $categories,
            'tags' => $tags,
        ];
    }

    public function updateProfile(AccountRequest $request)
    {
        $data = $request->validated();

        // handle avatar
        if ($request->hasFile('avatar')) {
            $folder = Auth::user()->id;
            $path = $this->mediaService->upload($request->file('avatar'), $folder);
            $data['avatar'] = $path;
        }
        return $this->userRepository->updateUser(Auth::user()->id, $data);
    }
}
