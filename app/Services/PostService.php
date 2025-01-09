<?php

namespace App\Services;

use App\Http\Requests\CommentRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class PostService
{
    protected CategoryRepository $categoryRepository;
    protected TagRepository $tagRepository;
    protected PostRepository $postRepository;
    protected CommentRepository $commentRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        TagRepository $tagRepository,
        PostRepository $postRepository,
        CommentRepository $commentRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        $this->postRepository = $postRepository;
        $this->commentRepository = $commentRepository;
    }

    public function detail(string $slugs)
    {
        $categories = $this->categoryRepository->allCategories();
        $tags = $this->tagRepository->allTags();
        $post = $this->postRepository->getPost($slugs);
        $popularPosts = $this->postRepository->popularPosts();
        return [
            'post' => $post,
            'tags' => $tags,
            'categories' => $categories,
            'popularPosts' => $popularPosts,
        ];
    }

    public function postsByCategory(string $slugs)
    {
        $categories = $this->categoryRepository->allCategories();
        $tags = $this->tagRepository->allTags();
        $category = $this->categoryRepository->getCategoryBySlugs($slugs);
        $posts = $this->postRepository->getPostsByCategory($category->id);
        $category['posts'] = $posts;
        return [
            'category' => $category,
            'categories' => $categories,
            'tags' => $tags,
        ];
    }


    public function comment(CommentRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        return $this->commentRepository->createComment($data);
    }
}
