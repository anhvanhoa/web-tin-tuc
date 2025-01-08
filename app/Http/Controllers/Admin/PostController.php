<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Services\Admin\PostService;

class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $data = $this->postService->getPosts();
        return view('admin.post.index', $data);
    }

    public function create()
    {
        $data = $this->postService->getData();
        return view('admin.post.add', $data);
    }

    public function store(PostRequest $request)
    {
        try {
            $this->postService->createPost($request);
            return redirect()->route('admin.posts.index')->with('success', 'Thêm bài viết thành công');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = $this->postService->getPostEdit($id);
        return view('admin.post.edit', $data);
    }

    public function update(PostRequest $request, string $id)
    {
        try {
            $this->postService->updatePost($request, $id);
            return redirect()->route('admin.posts.index')->with('success', 'Cập nhật bài viết thành công');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}
