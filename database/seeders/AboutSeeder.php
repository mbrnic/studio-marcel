<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            'category' => 'signature',
            'list_title' => '',
            'title' => 'Caffe Bar "CICI"',
            'subtitle' => 'Advertisement for a coffee shop',
            'description' => 'Advertisement of local caffe bar with their best coffy smell and taste, atleast you will need to trust this images.',
            'gallery_item_id' => 1,
            'order_id' => 1,
        ]);
        DB::table('abouts')->insert([
            'category' => 'signature',
            'list_title' => '',
            'title' => 'TK Cvelferija',
            'subtitle' => '20-years of tennis club',
            'description' => 'Promotional video of tennis tournament snapshots.',
            'gallery_item_id' => 2,
            'order_id' => 2,
        ]);
        DB::table('abouts')->insert([
            'category' => 'signature',
            'list_title' => '',
            'title' => 'NESTLE',
            'subtitle' => 'I collaborated with an influencer to create promotional content for the Nestlé brand.',
            'description' => 'Together, we brought the Nestlé brand to life through captivating visuals and authentic storytelling, crafting a promotional narrative that resonated with our audience.',
            'gallery_item_id' => 4,
            'order_id' => 3,
        ]);

        DB::table('abouts')->insert([
            'category' => 'media',
            'list_title' => '',
            'title' => 'Večernji list',
            'subtitle' => 'Croatian daily news',
            'description' => 'I participated in a video that was presented on national television for the purpose of promoting tourism in Croatia.',
            'gallery_item_id' => 5,
            'order_id' => 1,
        ]);
        DB::table('abouts')->insert([
            'category' => 'media',
            'list_title' => '',
            'title' => 'IMDb',
            'subtitle' => 'https://www.imdb.com/name/nm13629392/',
            'description' => 'The movie Adio shows us the pain which the main character is going through, but more importantly it shows the pain that his surroundings, family and loved ones are feeling and the consequnces they need to cope with.',
            'gallery_item_id' => 7,
            'order_id' => 2,
        ]);
    }
}
