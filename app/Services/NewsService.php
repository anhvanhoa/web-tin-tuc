<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Log;

class NewsService
{
    protected $categoryRepository;
    protected $tagRepository;
    protected $postRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        PostRepository $postRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    public function home()
    {
        $categories = $this->categoryRepository->allCategories();
        $posts = $this->postRepository->allPosts();
        Log::info($posts);
        return [
            'categories' => $categories,
            'posts' => $posts,
        ];
    }

}
