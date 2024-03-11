<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ScheduledClass;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScheduledClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScheduledClass::factory()
            ->count(10)
            ->sequence(fn ($sequence) => [
                'date_time' => Carbon::now()->addHours(24 + $sequence->index)->minute(0)->second(0),
            ])
            ->create();
    }
}
