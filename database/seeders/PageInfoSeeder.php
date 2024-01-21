<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PageInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('page_infos')->insert([
            'category' => 'meta description',
            'value' => 'Studio Marcel - Capturing life\'s most precious moments with passion and creativity. Explore our professional photography and videography services, specializing in weddings, events, and more. Let us tell your story through stunning visuals and cinematic experiences. Contact us for timeless memories and exceptional service.',
        ]);
        DB::table('page_infos')->insert([
            'category' => 'meta keywords',
            'value' => 'Wedding photography, Event videography, Professional photographer, Candid moments, Creative storytelling, Special events coverage, Cinematic wedding films, Portrait photography, Photojournalistic style, Destination weddings, Documentary filmmaking, Lifestyle photography, Corporate events coverage, Candid photography, Experienced videographer, Engagement sessions, High-quality cinematography, Emotional storytelling, Award-winning photographer, Artistic photo and video',
        ]);

        DB::table('page_infos')->insert([
            'category' => 'do photography text',
            'value' => 'Photography',
        ]);
        DB::table('page_infos')->insert([
            'category' => 'do filming text',
            'value' => 'Filming',
        ]);
        DB::table('page_infos')->insert([
            'category' => 'do video snapping text',
            'value' => 'Video Snapping',
        ]);

        DB::table('page_infos')->insert([
            'category' => 'what i do video src',
            'value' => 'video-1.mp4',
        ]);
        DB::table('page_infos')->insert([
            'category' => 'what i do video description',
            'value' => 'A creative filmmaker who loves making movies and videos, turning work into a joyful art adventure',
        ]);
        DB::table('page_infos')->insert([
            'category' => 'what i do video img src',
            'value' => 'video-1.jpg',
        ]);
        DB::table('page_infos')->insert([
            'category' => 'what i do video img alt',
            'value' => 'Tekst koji opisuje sliku za showreel',
        ]);

        DB::table('page_infos')->insert([
            'category' => 'quote',
            'value' => '" I don\'t even have to tell you how satisfied we are with everything so far, you have our recommendations 100% "',
        ]);
        DB::table('page_infos')->insert([
            'category' => 'quote',
            'value' => '" Thank you very much, you were wonderful 💓💓 I am delighted "',
        ]);

        DB::table('page_infos')->insert([
            'category' => 'portfolio title',
            'value' => 'Feast Your Eyes With Glimpse On My Portfolio',
        ]);

        DB::table('page_infos')->insert([
            'category' => 'contact me title',
            'value' => 'Seize the spotlight before it\'s taken!',
        ]);

        DB::table('page_infos')->insert([
            'category' => 'copyright',
            'value' => '© Copyright 2024 - Studio Marcel / Developed by: Matej Brnić',
        ]);
    }
}
