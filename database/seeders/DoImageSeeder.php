<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DoImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('do_images')->insert([
            'category' => 'photography',
            'src' => 'slika-do-1.jpg',
            'alt' => 'With an air of sophistication, a man in a pristine white t-shirt skillfully grasps a camera, ready to immortalize moments.',
        ]);
        DB::table('do_images')->insert([
            'category' => 'filming',
            'src' => 'slika-do-2.jpg',
            'alt' => 'A charismatic gentleman, adorned with a camera, beams with delight as he stands before a captivated crowd.',
        ]);
        DB::table('do_images')->insert([
            'category' => 'video snapping',
            'src' => 'slika-do-3.jpg',
            'alt' => 'A suave gentleman, immersed in his digital domain, sits gracefully at a cutting-edge computer, embracing the world of technology.',
        ]);
    }
}
