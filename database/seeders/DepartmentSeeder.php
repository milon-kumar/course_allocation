<?php

namespace Database\Seeders;

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
            "Business Administration",
            "English",
            "Biochemistry and Molecular Biology",
            "EEE",
            "Law",
            "Pharmacy",
            "CSE",
            "Civil Engineering",
            "Sociology",
            "Political Science",
            "Economics",
            "Microbiology"
        ];
    }
}
