<?php

namespace App\Repositories;

use App\Models\Comment;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class CommentRepository.
 */
class CommentRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Comment::class;
    }


    public function createComment(array $data)
    {
        return $this->create($data);
    }

    // Recent Comments

    public function recentComments()
    {
        return $this->model->orderBy('created_at', 'desc')->limit(5)->get();
    }
}
