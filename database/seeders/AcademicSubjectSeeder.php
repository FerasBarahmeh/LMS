<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = ['math', 'english', 'arabic', 'physics', 'chemistry', 'bio', 'history'];
        foreach ($subjects as $subject) {
            DB::table('academic_subjects')->insert([
                'name' => $subject,
            ]);
        }
    }
}
