<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'first_name' => 'Admin',
            'last_name' => ' User',
            'username' => 'admin',
            'privilege' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'about' => 'A results-driven backend developer with hand-on experience excelling in PHP, SQL, Laravel. Indicatively design and implement robust backend solutions.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Instructor User',
            'first_name' => 'Instructor',
            'last_name' => ' User',
            'username' => 'instructor',
            'privilege' => 'instructor',
            'email' => 'instructor@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'about' => 'A results-driven backend developer with hand-on experience excelling in PHP, SQL, Laravel. Indicatively design and implement robust backend solutions.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Student User',
            'first_name' => 'Student',
            'last_name' => ' User',
            'username' => 'student',
            'privilege' => 'student',
            'email' => 'student@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'about' => 'A results-driven backend developer with hand-on experience excelling in PHP, SQL, Laravel. Indicatively design and implement robust backend solutions.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
