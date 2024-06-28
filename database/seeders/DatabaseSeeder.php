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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Root User',
            'email' => 'root1234@gmail.com',
            'password' => bcrypt('root1234'),
            'role_id' => 1,
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'test User',
            'email' => 'test1234@gmail.com',
            'password' => bcrypt('test1234'),
            'role_id' => 2,
            'email_verified_at' => now(),
        ]);
    }
}
