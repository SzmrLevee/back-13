<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('teams')->insert([
            ['id' => 1, 'short_name' => 'BOS', 'full_name' => 'Boston Celtics'],
            ['id' => 2, 'short_name' => 'GSW', 'full_name' => 'Golden State Warriors'],
            ['id' => 3, 'short_name' => 'MIN', 'full_name' => 'Minnesota Timberwolves'],
            ['id' => 4, 'short_name' => 'MIA', 'full_name' => 'Miami Heat']
        ]);
    }
}
