<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin@example.com'),
                'role' => 'admin',
            ],
            [
                'name' => 'Mehedi Hasan Anik',
                'position' => 'Lecturer',
                'department' => 'Department of Law',
                'email' => 'mehedihasan.law@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md Riad Arefin',
                'position' => 'Lecturer',
                'department' => 'Department of Law',
                'email' => 'riadareein.law@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Fahatin Binta Faruque Maisha',
                'position' => 'Lecturer',
                'department' => 'Department of EEE',
                'email' => 'fahatinbinta.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Saimoon Al Farshi Oman',
                'position' => 'Lecturer',
                'department' => 'Department of CSE',
                'email' => 'saimoon.cse@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Dr. Shameem Ahmed',
                'position' => 'Assistant Professor',
                'department' => 'Department of CSE',
                'email' => 'shahmeem.cse@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Dr. Kazi Abdul Mukaddes Akand',
                'position' => 'Assistant Professor',
                'department' => 'Department of CSE',
                'email' => 'akand.cse@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Dr. A A Mizan',
                'position' => 'Professor',
                'department' => 'Department of EEE',
                'email' => 'mizan.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Reaz Uddin',
                'position' => 'Lecturer',
                'department' => 'Department of CSE',
                'email' => 'reaz.cse@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Rabiul Islam',
                'position' => 'Assistant Professor',
                'department' => 'Department of EEE',
                'email' => 'rabiul.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Mohammad Anwarul Islam',
                'position' => 'Lecturer',
                'department' => 'Department of EEE',
                'email' => 'anwar.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Dr. Ahmed Sarwar Uddin',
                'position' => 'Professor',
                'department' => 'Department of Law',
                'email' => 'sarwar.law@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Dr. Md. Saiful Islam',
                'position' => 'Assistant Professor',
                'department' => 'Department of Law',
                'email' => 'saiful.law@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Dr. Shahnaz Shahrin',
                'position' => 'Assistant Professor',
                'department' => 'Department of Law',
                'email' => 'shahnaz.law@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Shahriar Kabir',
                'position' => 'Lecturer',
                'department' => 'Department of Law',
                'email' => 'shahriar.law@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Shamsun Nahar',
                'position' => 'Lecturer',
                'department' => 'Department of Law',
                'email' => 'shamsun.law@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Mizanur Rahman',
                'position' => 'Lecturer',
                'department' => 'Department of Law',
                'email' => 'mizan.law@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Dr. Md. Ruhul Amin',
                'position' => 'Assistant Professor',
                'department' => 'Department of EEE',
                'email' => 'ruhul.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'M. Shamim Reza',
                'position' => 'Lecturer',
                'department' => 'Department of CSE',
                'email' => 'shamim.cse@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Mahmudul Hasan',
                'position' => 'Lecturer',
                'department' => 'Department of EEE',
                'email' => 'mahmud.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Abdul Malek',
                'position' => 'Lecturer',
                'department' => 'Department of EEE',
                'email' => 'malek.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Anisur Rahman',
                'position' => 'Lecturer',
                'department' => 'Department of EEE',
                'email' => 'anis.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Zahidul Islam',
                'position' => 'Lecturer',
                'department' => 'Department of EEE',
                'email' => 'zahid.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Dr. Md. Sohrab Hossain',
                'position' => 'Assistant Professor',
                'department' => 'Department of EEE',
                'email' => 'sohrab.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Shafiqul Islam',
                'position' => 'Lecturer',
                'department' => 'Department of EEE',
                'email' => 'shafiqul.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Dr. Md. Moniruzzaman',
                'position' => 'Assistant Professor',
                'department' => 'Department of CSE',
                'email' => 'monir.cse@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Saiful Islam',
                'position' => 'Lecturer',
                'department' => 'Department of CSE',
                'email' => 'saiful.cse@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Ariful Islam',
                'position' => 'Lecturer',
                'department' => 'Department of EEE',
                'email' => 'ariful.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Golam Mostafa',
                'position' => 'Lecturer',
                'department' => 'Department of EEE',
                'email' => 'mostafa.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Mahbubur Rahman',
                'position' => 'Lecturer',
                'department' => 'Department of EEE',
                'email' => 'mahbub.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Tariqul Islam',
                'position' => 'Lecturer',
                'department' => 'Department of EEE',
                'email' => 'tariqul.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Mohammad Amirul Islam',
                'position' => 'Lecturer',
                'department' => 'Department of EEE',
                'email' => 'amirul.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Nurul Islam',
                'position' => 'Lecturer',
                'department' => 'Department of EEE',
                'email' => 'nurul.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Md. Mahmudul Hasan',
                'position' => 'Lecturer',
                'department' => 'Department of EEE',
                'email' => 'mahmudul.eee@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'A.B.M. Mamun Khan',
                'position' => 'Lecturer',
                'department' => 'Department of CSE',
                'email' => 'mamun.cse@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
            [
                'name' => 'Shamima Akter',
                'position' => 'Lecturer',
                'department' => 'Department of Economics',
                'email' => 'shamima.eco@diu.ac',
                'password' => Hash::make('12345'),
                'role' => 'teacher',
            ],
        ];
        $i = 0;

        foreach ($users as $user){
            User::create([
                'department_id' => null,
                'name' => $user['name'],
                'email' => $user['email'],
                'priority' => $i ++,
                'password' => $user['password'],
                'position' => $user['position'] ?? null,
                'created_by' => 1,
                'role' => $user['role']
            ]);
        }
    }
}
