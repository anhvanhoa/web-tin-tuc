<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function show(string $slugs)
    {
        $data = $this->postService->detail($slugs);
        return view('post', $data);
    }

    public function postsByCategory(string $slugs)
    {
        $data = $this->postService->postsByCategory($slugs);
        return view('category', $data);
    }

    public function comment(CommentRequest $request)
    {
        try {
            $this->postService->comment($request);
            return back()->with('success', 'Bình luận thành công');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
