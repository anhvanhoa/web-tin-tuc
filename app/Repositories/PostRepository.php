<?php

namespace App\Repositories;

use App\Models\Post;
use Carbon\Carbon;
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
        return $this->model->where('status', 'published')->paginate(10);
    }

    // Popular Posts by comments
    public function popularPosts()
    {
        return $this->model
            ->select('posts.*')
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->where('posts.status', 'published')
            ->groupBy('posts.id', 'posts.title', 'posts.content', 'posts.created_at', 'posts.updated_at', 'posts.description', 'posts.slugs', 'posts.thumbnail', 'posts.status', 'posts.user_id', 'posts.category_id') // Thêm tất cả các cột vào GROUP BY
            ->orderByRaw('COUNT(comments.id) DESC')
            ->take(5)
            ->get();
    }
    public function getPost(string $slugs)
    {
        return $this->where('slugs', $slugs)->where('status', 'published')->first();
    }

    public function getPostsByCategory(string $id, int $limit = 10)
    {
        return $this->where('category_id', $id)->where('status', 'published')->paginate($limit);
    }

    public function deletePost(string $userId, string $postId)
    {
        return $this->model->where('user_id', $userId)->where('id', $postId)->delete();
    }

    public function getPostsByUser(string $userId)
    {
        return $this->where('user_id', $userId)->where('status', 'published')->paginate(10);
    }

    public function getPostsStatistics()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $result = $this->model->selectRaw("
            COUNT(*) as total_posts,
            SUM(CASE WHEN created_at BETWEEN ? AND ? THEN 1 ELSE 0 END) as new_posts",
            [$startOfMonth, $endOfMonth]
        )->first();
        return [
            'total_posts' => $result->total_posts,
            'new_posts' => $result->new_posts,
        ];
    }
}
