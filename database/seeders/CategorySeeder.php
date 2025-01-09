<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data sample
        $categories = [
            ['name' => 'Technology', 'status' => 'active'],
            ['name' => 'Health', 'status' => 'active'],
            ['name' => 'Education', 'status' => 'inactive'],
            ['name' => 'Entertainment', 'status' => 'active'],
            ['name' => 'Lifestyle', 'status' => 'inactive'],
        ];

        // Insert data into the table
        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slugs' => Str::slug($category['name']), // Tạo slug từ name
                'status' => $category['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
