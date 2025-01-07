<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;

class NewsService
{
    protected $categoryRepository;
    protected $tagRepository;
    protected $postRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        TagRepository $tagRepository,
        PostRepository $postRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        $this->postRepository = $postRepository;
    }

    public function home()
    {
        $categories = $this->categoryRepository->allCategories();
        $tags = $this->tagRepository->allTags();
        $posts = $this->postRepository->allPosts();
        return [
            'categories' => $categories,
            'tags' => $tags,
            'posts' => $posts,
        ];
    }

}
