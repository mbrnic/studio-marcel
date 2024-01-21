<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class AkaStringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aka_strings')->insert([
            'name' => 'Photographer',
            'order_id' => 1,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Shutterbug',
            'order_id' => 2,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Cameraperson',
            'order_id' => 3,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Videographer',
            'order_id' => 4,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Lensman',
            'order_id' => 5,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Cameraman',
            'order_id' => 6,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Snapper',
            'order_id' => 7,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Videomaker',
            'order_id' => 8,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Recordist',
            'order_id' => 9,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Cinematographer',
            'order_id' => 10,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Photomontager',
            'order_id' => 11,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Portraitist',
            'order_id' => 12,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Filmmaker',
            'order_id' => 13,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Camcorder',
            'order_id' => 14,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Camera Operator',
            'order_id' => 15,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Photo Editor',
            'order_id' => 16,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Video Editor',
            'order_id' => 17,
        ]);
        DB::table('aka_strings')->insert([
            'name' => 'Post-Productionist',
            'order_id' => 18,
        ]);
    }
}
