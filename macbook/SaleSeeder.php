<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sales')->insert([
            [
                'id' => 1,
                'buyer' => 'Robert Big',
                'macbook_id' => 4,
            ],
            [
                'id' => 2,
                'buyer' => 'Daniels Jack',
                'macbook_id' => 2,
            ],
            [
                'id' => 3,
                'buyer' => 'Alfred Johnson',
                'macbook_id' => 7,
            ],
            [
                'id' => 4,
                'buyer' => 'Thomas Tankengine',
                'macbook_id' => 10,
            ],
        ]);
    }
}
