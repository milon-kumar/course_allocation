<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DepartmentSeeder::class,
            CurriculumSeeder::class,
            SemesterSeeder::class,
            SubjectSeeder::class,
            UserSeeder::class,
            BatchSeeder::class,
        ]);
    }
}
