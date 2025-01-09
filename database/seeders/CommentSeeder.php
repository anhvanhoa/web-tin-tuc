<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'content' => 'This is a great post! Thank you for sharing.',
                'user_id' => 1, // Giả định user_id đã tồn tại
                'post_id' => 1, // Giả định post_id đã tồn tại
                'parent_id' => null,
                'status' => 'published',
            ],
            [
                'content' => 'I have a question about this topic.',
                'user_id' => 2,
                'post_id' => 1,
                'parent_id' => null,
                'status' => 'published',
            ],
            [
                'content' => 'Thanks for asking! Here’s my answer.',
                'user_id' => 1,
                'post_id' => 1,
                'parent_id' => 2, // Trả lời bình luận thứ 2
                'status' => 'published',
            ],
            [
                'content' => 'This article is very helpful.',
                'user_id' => 3,
                'post_id' => 2,
                'parent_id' => null,
                'status' => 'draft',
            ],
        ];

        foreach ($comments as $comment) {
            Comment::create([
                'content' => $comment['content'],
                'user_id' => $comment['user_id'],
                'post_id' => $comment['post_id'],
                'parent_id' => $comment['parent_id'],
                'status' => $comment['status'],
            ]);
        }
    }
}
