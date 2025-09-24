<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Wallet;
use App\Models\Notification;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (env('APP_ENV') != 'production') {
            User::factory(2)->create();

            User::factory()->create([
                'email' => 'user@gmail.com',
            ]);
        }

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

        if (env('APP_ENV') != 'production') {
            Notification::factory(20)->create();

            Wallet::factory(10)->create();
        }

        $this->call([
            SettingSeeder::class,
            GrantCategorySeeder::class,
        ]);
    }
}
