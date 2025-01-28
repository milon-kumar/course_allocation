<?php

namespace Database\Seeders;

use App\Models\Curriculum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "Bie Semester (Day Shift)",
            "Try Semester (Evening Shift)",
        ];

        foreach ($data as $d) {
            Curriculum::create([
                'department_id' => 1,
                'name' => $d,
                'created_by' => 1,
            ]);
        }
    }
}




