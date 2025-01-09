<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title' => 'How to Learn Laravel',
                'description' => 'A guide to learning Laravel framework effectively.',
                'content' => 'Laravel is a popular PHP framework...',
                'thumbnail' => 'https://example.com/images/laravel.jpg',
                'status' => 'published',
                'user_id' => 1, // Giả định user_id đã tồn tại
                'category_id' => 1, // Giả định category_id đã tồn tại
            ],
            [
                'title' => 'Understanding PHP Basics',
                'description' => 'Learn the basics of PHP programming.',
                'content' => 'PHP is a server-side scripting language...',
                'thumbnail' => 'https://example.com/images/php.jpg',
                'status' => 'draft',
                'user_id' => 2,
                'category_id' => 2,
            ],
            [
                'title' => 'Getting Started with React',
                'description' => 'Introduction to React library for building UIs.',
                'content' => 'React is a JavaScript library developed by Facebook...',
                'thumbnail' => 'https://example.com/images/react.jpg',
                'status' => 'published',
                'user_id' => 1,
                'category_id' => 3,
            ],
        ];

        foreach ($posts as $post) {
            Post::create([
                'title' => $post['title'],
                'slugs' => Str::slug($post['title']),
                'description' => $post['description'],
                'content' => $post['content'],
                'thumbnail' => $post['thumbnail'],
                'status' => $post['status'],
                'user_id' => $post['user_id'],
                'category_id' => $post['category_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
