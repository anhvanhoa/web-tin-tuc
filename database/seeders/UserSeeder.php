<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a user with admin role (root)
        User::create([
            'name' => 'Admin User',
            'avatar' => 'https://via.placeholder.com/150', // Ảnh mẫu
            'gender' => 'male',
            'status' => 'active',
            'email' => 'admin@gmail.com',
            'roles' => 'admin',
            'password' => Hash::make('123456'), // Mã hóa mật khẩu
        ]);

        // Create 10 users with user role
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "User $i",
                'avatar' => "https://via.placeholder.com/150?text=User+$i", // Ảnh đại diện tùy chỉnh
                'gender' => ['male', 'female', 'orther'][array_rand(['male', 'female', 'orther'])],
                'status' => ['inactive', 'active', 'locked'][array_rand(['inactive', 'active', 'locked'])],
                'email' => "user$i@example.com",
                'roles' => 'user',
                'password' => Hash::make('123456'), // Mật khẩu giống nhau
            ]);
        }
    }
}
