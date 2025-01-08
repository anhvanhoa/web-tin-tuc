<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\PostRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Services\MediaService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostService
{
    protected $postRepository;
    protected $categoryRepository;
    protected $tagRepository;
    protected $mediaService;

    public function __construct(
        PostRepository $postRepository,
        CategoryRepository $categoryRepository,
        TagRepository $tagRepository,
        MediaService $mediaService
    ) {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        $this->mediaService = $mediaService;
    }

    public function getPosts()
    {
        $posts = $this->postRepository->all();
        return [
            'posts' => $posts
        ];
    }

    public function getData()
    {
        $categories = $this->categoryRepository->all();
        $tags = $this->tagRepository->all();
        return [
            'categories' => $categories,
            'tags' => $tags
        ];
    }

    public function createPost(PostRequest $request)
    {
        $data = $request->validated();

        //handle thumbnail
        $userId = Auth::user()->id;
        $thumbnail = $this->mediaService->upload($request->file('thumbnail'), $userId);
        $data['thumbnail'] = $thumbnail;
        $data['user_id'] = $userId;

        $post = $this->postRepository->create($data);
        $post->tags()->sync($data['tags']);
    }

    public function getPostEdit($id)
    {
        $data = $this->getData();
        $data['post'] = $this->postRepository->getById($id);
        return $data;
    }

    public function updatePost(PostRequest $request, $id)
    {
        $data = $request->validated();
        $post = $this->postRepository->getById($id);

        //handle thumbnail
        $userId = Auth::user()->id;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $this->mediaService->upload($request->file('thumbnail'), $userId);
            $data['thumbnail'] = $thumbnail;
        }

        $post->update($data);
        $post->tags()->sync($data['tags']);
    }

    public function deletePost(string $id)
    {
        $email = Auth::user()->email;
        $adminMail = config('app.admin_mail');
        $userId = Auth::user()->id;
        if ($email == $adminMail) {
            return $this->postRepository->deleteById($id);
        }
        return $this->postRepository->deletePost($userId, $id);
    }
}
