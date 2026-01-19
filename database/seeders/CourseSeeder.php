<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::insert([
              [
                'name' => 'Robotics',
                'description' => 'Improve creativity and imagination through drawing.',
                'age_from' => 3,
                'age_to' => 6,
                'capacity' => 40,
                'start_time' => '08:00:00',
                'end_time' => '10:00:00',
                'price' => 290.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [    'name'=> 'Art',
                'description' => 'Learn rhythm, movement, and self-expression.',
                'age_from' => 3,
                'age_to' => 6,
                'capacity' => 35,
                'start_time' => '10:00:00',
                'end_time' => '12:00:00',
                'price' => 300.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'musice',
                'description' => 'Explore science through fun experiments.',
                'age_from' => 4,
                'age_to' => 7,
                'capacity' => 30,
                'start_time' => '12:00:00',
                'end_time' => '14:00:00',
                'price' => 320.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
