<?php

namespace App\Services;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Repositories\CategoryRepository;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;

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
        return [
            'post' => $post,
            'tags' => $tags,
            'categories' => $categories,
        ];
    }

    public function postsByCategory(string $slugs)
    {
        $categories = $this->categoryRepository->allCategories();
        $tags = $this->tagRepository->allTags();
        $category = $this->categoryRepository->getCategoryBySlugs($slugs);

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
