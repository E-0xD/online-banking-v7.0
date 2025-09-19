<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)->create();

        User::factory()->create([
            'email' => 'user@gmail.com',
        ]);

        User::factory()->create([
            'role' => 'admin',
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
        ]);

        User::factory()->create([
            'role' => 'master',
            'name' => 'Master User',
            'email' => 'master@gmail.com',
        ]);
    }
}
