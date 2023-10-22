<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            // Tags relevant to both reviews and products
            ['name' => 'Perfect Picture', 'color' => '#00FF00'],
            ['name' => 'Bad Work', 'color' => '#FF0000'],
            ['name' => 'Impressive', 'color' => '#FFFF00'],

        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert($tag);
        }
    }
}
