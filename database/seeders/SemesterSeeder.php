<?php

    namespace Database\Seeders;

    use App\Models\Semester;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class SemesterSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            $data  = [
                "1st Semester",
                "2nd Semester",
                "3rd Semester",
                "4th Semester",
                "5th Semester",
                "6th Semester",
                "7th Semester",
                "8th Semester",
                "9th Semester",
                "10th Semester",
                "11th Semester",
                "12th Semester",
            ];

            foreach ($data as $semester){
                Semester::create([
                    'department_id'=> 1,
                    'curriculum_id' => 2,
                    'name' => $semester ?? 'Semester Name',
                    'created_by' => 1,
                ]);
            }

    }
    }
