<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('destinations')->insert([
            ['id' => 1, 'country' => 'Ausztria', 'city' => 'Bécs'],
            ['id' => 2, 'country' => 'Ausztria', 'city' => 'Salzburg'],
            ['id' => 3, 'country' => 'Szlovákia', 'city' => 'Pozsony'],
        ]);
    }
}
