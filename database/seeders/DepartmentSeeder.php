<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $academicDisciplines = [
            "Computer Science & Engineering (CSE) ",
            "English",
            "Biochemistry and Molecular Biology",
            "EEE",
            "Law",
            "Pharmacy",
            "Business Administration",
            "Civil Engineering",
            "Sociology",
            "Political Science",
            "Economics",
            "Microbiology"
        ];

        foreach ($academicDisciplines as $academicDiscipline){
            Department::create([
               'name' => $academicDiscipline,
                'created_by' => 1
            ]);
        }
    }
}
