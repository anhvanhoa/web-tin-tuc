<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // data sample
        $tags = [
            ['name' => 'Laravel', 'status' => 'active', 'color' => '#ff2d20'],
            ['name' => 'PHP', 'status' => 'active', 'color' => '#777bb4'],
            ['name' => 'JavaScript', 'status' => 'active', 'color' => '#f7df1e'],
            ['name' => 'HTML', 'status' => 'inactive', 'color' => '#e34f26'],
            ['name' => 'CSS', 'status' => 'active', 'color' => '#2965f1'],
            ['name' => 'React', 'status' => 'inactive', 'color' => '#61dafb'],
        ];

        // Insert data into the table
        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag['name'],
                'slugs' => Str::slug($tag['name']), // Create slug from name
                'status' => $tag['status'],
                'color' => $tag['color'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
