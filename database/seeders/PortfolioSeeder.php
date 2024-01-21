<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('portfolios')->insert([
            'title' => 'Wedding',
            'order_id' => 1,
            'gallery_item_id' => 8,
        ]);
        DB::table('portfolios')->insert([
            'title' => 'Model',
            'order_id' => 2,
            'gallery_item_id' => 14,
        ]);
        DB::table('portfolios')->insert([
            'title' => 'Landscaping',
            'order_id' => 3,
            'gallery_item_id' => 24,
        ]);
        DB::table('portfolios')->insert([
            'title' => 'Events',
            'order_id' => 4,
            'gallery_item_id' => 29,
        ]);
        DB::table('portfolios')->insert([
            'title' => 'Private Events',
            'order_id' => 5,
            'gallery_item_id' => 37,
        ]);
        DB::table('portfolios')->insert([
            'title' => 'Real Estate',
            'order_id' => 6,
            'gallery_item_id' => 41,
        ]);
    }
}
