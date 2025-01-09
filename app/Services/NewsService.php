<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Log;

class NewsService
{
    protected $categoryRepository;
    protected $tagRepository;
    protected $postRepository;
    protected $commentRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        PostRepository $postRepository,
        CommentRepository $commentRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
        $this->commentRepository = $commentRepository;
    }

    public function home()
    {
        $categories = $this->categoryRepository->allCategories();
        $posts = $this->postRepository->allPosts();
        $popularPosts = $this->postRepository->popularPosts();
        $recentComments = $this->commentRepository->recentComments();
        return [
            'categories' => $categories,
            'posts' => $posts,
            'popularPosts'  => $popularPosts,
            'recentComments' => $recentComments,
        ];
    }
}
