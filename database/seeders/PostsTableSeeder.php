<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'design pattern',
            'uuid' => Str::uuid(),
            'category' => 'technology',
            'image' => 'https://miro.medium.com/v2/resize:fit:1400/1*xu1Ge_Cew0DHdSU6ETcpLQ.png',
            'slug' => 'design-pattern',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'animal',
            'uuid' => Str::uuid(),
            'category' => 'technology',
            'image' => 'https://media.wired.com/photos/593261cab8eb31692072f129/master/pass/85120553.jpg',
            'slug' => 'animal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
            'user_id' => 2,
            'title' => 'food',
            'uuid' => Str::uuid(),
            'category' => 'technology',
            'image' => 'https://cdn.britannica.com/36/123536-050-95CB0C6E/Variety-fruits-vegetables.jpg',
            'slug' => 'food',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
            'user_id' => 2,
            'title' => 'animal planet',
            'uuid' => Str::uuid(),
            'category' => 'technology',
            'image' => 'https://deadline.com/wp-content/uploads/2018/10/animal-planet-logos-2.jpg',
            'slug' => 'animal-planet',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
