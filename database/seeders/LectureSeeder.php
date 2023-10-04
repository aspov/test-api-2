<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lectures = \App\Models\Lecture::factory(10)->create();
    }
}
