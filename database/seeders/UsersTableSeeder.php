<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => bcrypt('password'), 'role' => 'admin']
        );

        User::firstOrCreate(
            ['email' => 'editor@example.com'],
            ['name' => 'Editor', 'password' => bcrypt('password'), 'role' => 'editor']
        );

        User::firstOrCreate(
            ['email' => 'viewer@example.com'],
            ['name' => 'Viewer', 'password' => bcrypt('password'), 'role' => 'viewer']
        );
    }
}
