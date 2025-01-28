<?php

namespace Database\Seeders;

use App\Models\Batch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Batch::create( [
            'department_id' => 1,
            'curriculum_id' => 2,
            'coordinator'=>2,
            'name' => "CSE - 95",
            'number' => "01794873427",
            'created_by' => 1
        ]);
    }
}
