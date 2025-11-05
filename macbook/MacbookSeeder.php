<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MacbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('macbooks')->insert([
            [
                'id' => 1,
                'name' => 'MacBook Air',
                'chip' => 'M2',
                'introduced' => '2022-06-06',
                'base_ram' => 8,
            ],
            [
                'id' => 2,
                'name' => 'MacBook Air',
                'chip' => 'M3',
                'introduced' => '2024-03-04',
                'base_ram' => 16,
            ],
            [
                'id' => 3,
                'name' => 'MacBook Pro',
                'chip' => 'M2',
                'introduced' => '2022-06-06',
                'base_ram' => 8,
            ],
            [
                'id' => 4,
                'name' => 'MacBook Pro',
                'chip' => 'M2 Pro',
                'introduced' => '2023-01-17',
                'base_ram' => 16,
            ],
            [
                'id' => 5,
                'name' => 'MacBook Pro',
                'chip' => 'M2 Max',
                'introduced' => '2023-01-17',
                'base_ram' => 32,
            ],
            [
                'id' => 6,
                'name' => 'MacBook Pro',
                'chip' => 'M3',
                'introduced' => '2023-10-30',
                'base_ram' => 8,
            ],
            [
                'id' => 7,
                'name' => 'MacBook Pro',
                'chip' => 'M3 Pro',
                'introduced' => '2023-10-30',
                'base_ram' => 16,
            ],
            [
                'id' => 8,
                'name' => 'MacBook Pro',
                'chip' => 'M3 Max',
                'introduced' => '2023-10-30',
                'base_ram' => 32,
            ],
            [
                'id' => 9,
                'name' => 'MacBook Pro',
                'chip' => 'M4',
                'introduced' => '2024-10-30',
                'base_ram' => 16,
            ],
            [
                'id' => 10,
                'name' => 'MacBook Pro',
                'chip' => 'M4 Pro',
                'introduced' => '2024-10-30',
                'base_ram' => 24,
            ],
            [
                'id' => 11,
                'name' => 'MacBook Pro',
                'chip' => 'M4 Max',
                'introduced' => '2024-10-30',
                'base_ram' => 48,
            ],
        ]);
    }
}
