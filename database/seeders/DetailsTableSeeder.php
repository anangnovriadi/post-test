<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('details')->insert([
            'post_id' => 1,
            'start_date' => '2024-02-24 02:00:00',
            'end_date' => '2024-02-27 04:00:00',
            'description' => 'lorem ipsum',
            'tags' => 'tech,programming,data',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('details')->insert([
            'post_id' => 2,
            'start_date' => '2024-02-25 02:00:00',
            'end_date' => '2024-02-27 05:00:00',
            'description' => 'lorem ipsum dolor',
            'tags' => 'tech,data',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('details')->insert([
            'post_id' => 3,
            'start_date' => '2024-02-25 04:00:00',
            'end_date' => '2024-02-27 06:00:00',
            'description' => 'lorem ipsum dolor',
            'tags' => 'animal,data',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('details')->insert([
            'post_id' => 4,
            'start_date' => '2024-02-26 06:00:00',
            'end_date' => '2024-02-27 10:00:00',
            'description' => 'lorem ipsum dolor',
            'tags' => 'food,drink,eat',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
