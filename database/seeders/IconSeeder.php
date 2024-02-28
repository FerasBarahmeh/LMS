<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IconSeeder extends Seeder
{

    private array $icons = [
        'linkedin', 'facebook', 'x', 'twitter',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->icons as $icon) {
            DB::table('icons')->insert([
                'name' => $icon,
                'svg_file_path' => 'img/icons/' . strtolower($icon) . '.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

}
