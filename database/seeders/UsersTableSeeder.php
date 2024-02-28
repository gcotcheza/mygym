<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ghie',
            'email' => 'ghie@test.nl',
            'role' => 'member',
        ]);

        User::factory()->create([
            'name' => 'Jane',
            'email' => 'jane@test.nl',
            'role' => 'instructor',
        ]);

        User::factory()->create([
            'name' => 'John',
            'email' => 'john@test.nl',
            'role' => 'admin',
        ]);

        User::factory()->count(10)->create();

        User::factory()->count(10)->create([
            'role' => 'instructor',
        ]);
    }
}
