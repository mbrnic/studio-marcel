<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class GalleryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gallery_items')->insert([
            'category' => 'signature',
            'category_id' => 1,
            'src' => 'https://www.youtube.com/watch?v=YdUr28ECL3M',
            'alt' => 'Advertisement for a coffee shop',
            'order_id' => 1,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'signature',
            'category_id' => 2,
            'src' => 'https://www.youtube.com/watch?v=b8-gO1d6Ai0',
            'alt' => '20-years of tennis club',
            'order_id' => 1,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'signature',
            'category_id' => 3,
            'src' => 'signature-video-1.mp4',
            'alt' => 'I collaborated with an influencer to create promotional content for the Nestlé brand.',
            'order_id' => 1,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'signature',
            'category_id' => 3,
            'src' => 'signature-video-1.jpg',
            'alt' => 'I collaborated with an influencer to create promotional content for the Nestlé brand.',
            'order_id' => 2,
        ]);

        DB::table('gallery_items')->insert([
            'category' => 'media',
            'category_id' => 4,
            'src' => 'media-slika-1-1.jpg',
            'alt' => 'I participated in a video that was presented on national television for the purpose of promoting tourism in Croatia.',
            'order_id' => 1,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'media',
            'category_id' => 4,
            'src' => 'media-slika-1-2.jpg',
            'alt' => 'I participated in a video that was presented on national television for the purpose of promoting tourism in Croatia.',
            'order_id' => 2,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'media',
            'category_id' => 5,
            'src' => 'media-slika-2.jpg',
            'alt' => 'The movie Adio shows us the pain which the main character is going through, but more importantly it shows the pain that his surroundings, family and loved ones are feeling and the consequnces they need to cope with.',
            'order_id' => 1,
        ]);



        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 1,
            'src' => 'portfolio-1-1.jpg',
            'alt' => 'A captivating wedding party, elegantly poised on a rustic wooden staircase, immortalizes their joyous union in a timeless photograph.',
            'order_id' => 1,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 1,
            'src' => 'portfolio-1-2.jpg',
            'alt' => 'A passionate couple embraces tenderly, their love radiating against a rustic brick wall, creating a timeless and captivating scene of affection.',
            'order_id' => 2,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 1,
            'src' => 'portfolio-1-3.jpg',
            'alt' => 'A captivating wedding moment captured by a skilled photographer amidst the scenic beauty of a park, near a majestic tree.',
            'order_id' => 3,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 1,
            'src' => 'portfolio-1-4.jpg',
            'alt' => 'A blissful bride and groom radiate joy as they stand before a majestic tree, their smiles illuminating the serene atmosphere.',
            'order_id' => 4,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 1,
            'src' => 'portfolio-1-5.jpg',
            'alt' => 'Witness the enchanting sight of a person elegantly gliding along a bridge, as seen from a majestic wedding drone\'s lens.',
            'order_id' => 5,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 1,
            'src' => 'https://www.youtube.com/watch?v=8nZopdjzVCo',
            'alt' => 'Tena & Karlo wedding movie',
            'order_id' => 6,
        ]);

        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 2,
            'src' => 'portfolio-2-1.jpg',
            'alt' => 'A stylish lady donning a mint green blazer and white pants elegantly poses, clutching a chic blue purse.',
            'order_id' => 1,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 2,
            'src' => 'portfolio-2-2.jpg',
            'alt' => 'A poised lady, gracefully seated on a ledge, her legs elegantly crossed, exuding an air of serene sophistication.',
            'order_id' => 2,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 2,
            'src' => 'portfolio-2-3.jpg',
            'alt' => 'A graceful lady perched on a ledge, elegantly resting her feet, exuding an air of poise and tranquility.',
            'order_id' => 3,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 2,
            'src' => 'portfolio-2-4.jpg',
            'alt' => 'A graceful lady in an elegant black gown stands gracefully beside a majestic horse, exuding an air of sophistication and timeless beauty.',
            'order_id' => 4,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 2,
            'src' => 'portfolio-2-5.jpg',
            'alt' => 'A graceful lady, adorned in a resplendent pink gown, stands elegantly amidst a vast field, exuding an aura of serenity.',
            'order_id' => 5,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 2,
            'src' => 'portfolio-2-6.jpg',
            'alt' => 'In the enchanting embrace of twilight, a couple finds solace on a hay bale, basking in the golden hues of a breathtaking sunset.',
            'order_id' => 6,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 2,
            'src' => 'portfolio-2-7.jpg',
            'alt' => 'In an opulent basket, a dashing gentleman and a graceful lady tenderly hold the delicate garments of a precious little one.',
            'order_id' => 7,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 2,
            'src' => 'portfolio-2-8.jpg',
            'alt' => 'An enchanting lady, her lips painted in a vibrant shade of red, elegantly showcasing a dazzling gold ring on her hand.',
            'order_id' => 8,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 2,
            'src' => 'portfolio-2-9.jpg',
            'alt' => 'A graceful lady rests on the verdant grass, her presence accentuating the rustic charm of the wooden shack nearby.',
            'order_id' => 9,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 2,
            'src' => 'portfolio-2-10.jpg',
            'alt' => 'Elegantly adorned in a sleek black dress, a graceful woman strolls along the sidewalk, exuding an air of sophistication and poise.',
            'order_id' => 10,
        ]);

        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 3,
            'src' => 'portfolio-3-1.jpg',
            'alt' => 'A picturesque winter scene showcasing a vintage wooden house nestled amidst a pristine blanket of snow.',
            'order_id' => 1,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 3,
            'src' => 'portfolio-3-2.jpg',
            'alt' => 'A captivating monochrome image showcasing a majestic tree gracefully standing amidst serene waters.',
            'order_id' => 2,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 3,
            'src' => 'portfolio-3-3.jpg',
            'alt' => 'A majestic boat glides gracefully through the glistening waters, accompanied by a picturesque bridge in the backdrop.',
            'order_id' => 3,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 3,
            'src' => 'portfolio-3-4.jpg',
            'alt' => 'Elegant trio strolling on a majestic bridge, gracefully traversing the cityscape backdrop.',
            'order_id' => 4,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 3,
            'src' => 'portfolio-3-5.jpg',
            'alt' => 'A dapper gentleman gracefully pedals his bicycle along the bustling city street, exuding an air of sophistication and leisure.',
            'order_id' => 5,
        ]);

        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 4,
            'src' => 'portfolio-4-1.jpg',
            'alt' => 'A captivating ensemble of individuals adorned in exquisite traditional attire, gracefully gracing the stage with their cultural elegance.',
            'order_id' => 1,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 4,
            'src' => 'portfolio-4-2.jpg',
            'alt' => 'On a grand stage, a mesmerizing tableau unfolds as a collective of individuals, donned in exquisite traditional garments, captivate the audience with their cultural splendor.',
            'order_id' => 2,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 4,
            'src' => 'portfolio-4-3.jpg',
            'alt' => 'A resplendent lady, adorned in a vibrant dress and exquisite headdress, gracefully commands the stage.',
            'order_id' => 3,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 4,
            'src' => 'portfolio-4-4.jpg',
            'alt' => 'A captivating scene unfolds as a cluster of distinguished gentlemen command the stage, bathed in a radiant glow.',
            'order_id' => 4,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 4,
            'src' => 'portfolio-4-5.jpg',
            'alt' => 'The resplendent stage showcases a harmonious assembly of individuals, donning ethereal white garments, captivating all with their presence.',
            'order_id' => 5,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 4,
            'src' => 'portfolio-4-6.jpg',
            'alt' => 'A splendid procession of equestrians gracefully parading on their majestic horses, captivating the onlookers\' hearts.',
            'order_id' => 6,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 4,
            'src' => 'portfolio-4-7.jpg',
            'alt' => 'Two elegantly dressed gentlemen gracefully ride their majestic horses down a bustling street.',
            'order_id' => 7,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 4,
            'src' => 'portfolio-4-8.jpg',
            'alt' => 'In a splendid display of horsemanship, a distinguished group of men elegantly ride their noble steeds along the bustling street, captivating all with their refined presence.',
            'order_id' => 8,
        ]);

        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 5,
            'src' => 'portfolio-5-1.jpg',
            'alt' => 'Elegant soirée with vibrant ambiance, where jubilant guests revel in a room adorned with a captivating red and blue backdrop.',
            'order_id' => 1,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 5,
            'src' => 'portfolio-5-2.jpg',
            'alt' => 'A splendid gathering of individuals, adorned in their finest attire, poised gracefully before a resplendent Christmas tree.',
            'order_id' => 2,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 5,
            'src' => 'portfolio-5-3.jpg',
            'alt' => 'Elegant lady in a stunning dress and chic glasses indulges in the pleasure of savoring wine at a glamorous soirée.',
            'order_id' => 3,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 5,
            'src' => 'portfolio-5-4.jpg',
            'alt' => 'A dapper gentleman, adorned in a stylish vest and tie, gracefully dances amidst a jubilant crowd.',
            'order_id' => 4,
        ]);

        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 6,
            'src' => 'portfolio-6-1.jpg',
            'alt' => 'Exquisite living room adorned with a tasteful table, elegant chairs, and a captivating TV.',
            'order_id' => 1,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 6,
            'src' => 'portfolio-6-2.jpg',
            'alt' => 'A lavish dining room ensemble, featuring a polished wooden table adorned with elegant chairs.',
            'order_id' => 2,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 6,
            'src' => 'portfolio-6-3.jpg',
            'alt' => 'A lavish table adorned with elegant chairs, centered around a splendid grill, exuding an air of opulence and sophistication.',
            'order_id' => 3,
        ]);
        DB::table('gallery_items')->insert([
            'category' => 'portfolio',
            'category_id' => 6,
            'src' => 'portfolio-6-4.mp4',
            'alt' => '360 virtual tour of house',
            'order_id' => 4,
        ]);

    }
}
