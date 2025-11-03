<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trips')->insert([
            [
                'destination_id' => 1,
                'title' => 'Irány Bécs advent első vasárnapján, egy napos kirándulás.',
                'start_date' => '2024-12-01',
                'end_date' => '2024-12-01',
                'price' => 48.88
            ],
            [
                'destination_id' => 1,
                'title' => 'Adventi hétvége Bécsben (2 nap, egy éjszaka)',
                'start_date' => '2024-12-07',
                'end_date' => '2024-12-08',
                'price' => 120.00
            ],
            [
                'destination_id' => 2,
                'title' => 'Egy nap Salzburgban',
                'start_date' => '2024-12-08',
                'end_date' => '2024-12-08',
                'price' => 79.90
            ],
            [
                'destination_id' => 1,
                'title' => 'Töltse az ezüstvasárnapot Bécsben',
                'start_date' => '2024-12-15',
                'end_date' => '2024-12-15',
                'price' => 48.88
            ],
            [
                'destination_id' => 3,
                'title' => 'Aranyvasárnap Pozsonyban',
                'start_date' => '2024-12-22',
                'end_date' => '2024-12-22',
                'price' => 67.99
            ],
            [
                'destination_id' => 3,
                'title' => 'Karácsony Pozsonyban',
                'start_date' => '2024-12-23',
                'end_date' => '2024-12-27',
                'price' => 1230.00
            ],
        ]);
    }
}
