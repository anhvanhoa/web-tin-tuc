<?php

namespace App\Services;

use App\Http\Requests\AccountRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AccountService
{
    protected $userRepository;
    protected $categoryRepository;
    protected $tagRepository;
    protected $mediaService;
    protected $postRepository;

    public function __construct(
        UserRepository $userRepository,
        CategoryRepository $categoryRepository,
        TagRepository $tagRepository,
        MediaService $mediaService,
        PostRepository $postRepository
    ) {
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        $this->mediaService = $mediaService;
        $this->postRepository = $postRepository;
    }

    public function profile()
    {
        $categories = $this->categoryRepository->allCategories();
        $tags = $this->tagRepository->allTags();
        $user = $this->userRepository->getByEmail(Auth::user()->email);
        $posts = $this->postRepository->getPostsByUser(Auth::user()->id);
        $user->posts = $posts;
        return [
            'user' => $user,
            'categories' => $categories,
            'tags' => $tags,
        ];
    }

    public function updateProfile(AccountRequest $request)
    {
        $data = $request->validated();

        $adminMail = config('app.admin_mail');
        if ($adminMail == Auth::user()->email && $request->email != Auth::user()->email) {
            throw new \Exception('Không thể cập nhật email admin');
        }
        // handle avatar
        if ($request->hasFile('avatar')) {
            $folder = Auth::user()->id;
            $path = $this->mediaService->upload($request->file('avatar'), $folder);
            $data['avatar'] = $path;
        }
        return $this->userRepository->updateUser(Auth::user()->id, $data);
    }
}
