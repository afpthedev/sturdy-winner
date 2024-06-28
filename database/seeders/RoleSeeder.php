<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'user', 'role_id' => 0]); // User
        Role::create(['name' => 'admin', 'role_id' => 1]); // Admin
        Role::create(['name' => 'other', 'role_id' => 2]); // Other
    }
}
