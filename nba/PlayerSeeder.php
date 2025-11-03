<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('players')->insert([
            ['id' => 1, 'name' => 'Matt Fish', 'height' => 210.82, 'team_id' => 4],
            ['id' => 2, 'name' => 'Walter McCarty', 'height' => 208.28, 'team_id' => 1],
            ['id' => 3, 'name' => 'James Posey', 'height' => 203.2, 'team_id' => 1],
            ['id' => 4, 'name' => 'James Michael McAdoo', 'height' => 205.74, 'team_id' => 2],
            ['id' => 5, 'name' => 'Ricky Davis', 'height' => 200, 'team_id' => 3]
        ]);
    }
}
