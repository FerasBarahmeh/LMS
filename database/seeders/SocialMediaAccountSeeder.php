<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class SocialMediaAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('social_media_accounts')->insert([
            'name' => 'linkedin',
            'username' => 'feras-barahmeh',
            'link' => 'https://www.linkedin.com/in/feras-barahmeh/',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('social_media_accounts')->insert([
            'name' => 'X',
            'username' => 'FerasBarahmeh',
            'link' => 'https://twitter.com/FerasBarahmeh',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
