<?php

namespace App\Services\Admin;

use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;

class DashboardService
{

    protected $userRepository;
    protected $postRepository;
    protected $commentRepository;
    protected $tagRepository;

    public function __construct(
        UserRepository $userRepository,
        PostRepository $postRepository,
        CommentRepository $commentRepository,
        TagRepository $tagRepository
    ) {
        $this->userRepository = $userRepository;
        $this->postRepository = $postRepository;
        $this->commentRepository = $commentRepository;
        $this->tagRepository = $tagRepository;
    }


    public function dashboard()
    {
        $userStatistics = $this->userRepository->getUserStatistics();
        $postStatistics = $this->postRepository->getPostsStatistics();
        $commentStatistics = $this->commentRepository->getCommentsStatistics(Carbon::now()->month, Carbon::now()->year);
        return [
            'user_statistics' => $userStatistics,
            'post_statistics' => $postStatistics,
            'comment_statistics' => $commentStatistics,
        ];
    }
}
