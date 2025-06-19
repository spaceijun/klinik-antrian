<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingwebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settingwebsites')->insert([
            [
                'title' => 'Starterkit SangkalaTech',
                'description' => 'This a starter kit from SangkalaTech V.1.1',
                'favicon' => 'storage/sangkala.png',
                'logo' => 'storage/sangkala.png',
            ],
        ]);
    }
}
