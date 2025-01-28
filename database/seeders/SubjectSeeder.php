<?php

namespace Database\Seeders;

use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'department_id' => 1 ,
                'curriculum_id' => 2 ,
                'semester_id' =>  1,
                'name' => "Physics - ii " ,
                'code' => "cse-101" ,
                'credit' => 4 ,
                'is_lab' => true ,
                'created_by' => 1,
             ]
        ];

        Subject::insert($subjects);
    }
}
