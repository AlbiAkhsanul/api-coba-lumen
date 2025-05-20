<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            ['npm' => '22081010194', 'name' => 'Albi Akhsanul Hakim', 'year' => '2022', 'ipk' => '3.5'],
            ['npm' => '22081010131', 'name' => 'Irsyad Fadhil Makarim', 'year' => '2022', 'ipk' => '3.5'],
            ['npm' => '22081010251', 'name' => 'Kalfin Syah Kilau Mayya', 'year' => '2022',  'ipk' => '3.5'],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
