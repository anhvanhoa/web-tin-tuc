<?php

namespace App\Repositories;

use App\Models\Post;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class PostRepository.
 */
class PostRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Post::class;
    }

    public function allPosts()
    {
        return $this->all();
    }

    public function getPost(string $slugs)
    {
        return $this->where('slugs', $slugs)->first();
    }

    public function getPostsByCategory(string $slugs)
    {
        return $this->where('category_id', $slugs)->get();
    }

    public function deletePost(string $userId, string $postId)
    {
        return $this->model->where('user_id', $userId)->where('id', $postId)->delete();
    }
}
