<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classrooms = \App\Models\Classroom::factory(10)->create();
    }
}
