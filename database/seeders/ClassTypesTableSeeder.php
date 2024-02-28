<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassType::create([
            'name' => 'Yoga',
            'description' => fake()->text(),
            'minutes' => 60,
        ]);

        ClassType::create([
            'name' => 'Pilates',
            'description' => fake()->text(),
            'minutes' => 40,
        ]);

        ClassType::create([
            'name' => 'Dancing Fitness',
            'description' => fake()->text(),
            'minutes' => 60,
        ]);

        ClassType::create([
            'name' => 'Zumba',
            'description' => fake()->text(),
            'minutes' => 60,
        ]);

        ClassType::create([
            'name' => 'Boxing',
            'description' => fake()->text(),
            'minutes' => 50,
        ]);

        ClassType::create([
            'name' => 'Tai Chi',
            'description' => fake()->text(),
            'minutes' => 45,
        ]);
    }
}
