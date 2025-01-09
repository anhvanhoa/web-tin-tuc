<?php

namespace Database\Seeders;

use App\Models\PostTag;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postTags = [
            ['post_id' => 1, 'tag_id' => 1],
            ['post_id' => 1, 'tag_id' => 2],
            ['post_id' => 2, 'tag_id' => 3],
            ['post_id' => 2, 'tag_id' => 4],
            ['post_id' => 3, 'tag_id' => 1],
            ['post_id' => 3, 'tag_id' => 5],
        ];

        foreach ($postTags as $postTag) {
            PostTag::create([
                'post_id' => $postTag['post_id'],
                'tag_id' => $postTag['tag_id'],
            ]);
        }
    }
}
