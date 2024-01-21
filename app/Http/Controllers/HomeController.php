<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AkaString;
use App\Models\DoImage;
use App\Models\PageInfo;
use App\Models\GalleryItem;
use App\Models\Portfolio;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {        
        return view('home.index', [
            'metaDescription' => PageInfo::where('category', 'meta description')->first()->value,
            'metaKeywords' => PageInfo::where('category', 'meta keywords')->first()->value,

            'akaStrings' => AkaString::orderBy('order_id')->get(),
            
            'doPhotographyText' => PageInfo::where('category', 'do photography text')->first()->value,
            'doFilmingText' => PageInfo::where('category', 'do filming text')->first()->value,
            'doVideoSnappingText' => PageInfo::where('category', 'do video snapping text')->first()->value,
            'doPhotographyImage' => $this->getImage('photography'),
            'doFilmingImage' => $this->getImage('filming'),
            'doVideoSnappingImage' => $this->getImage('video snapping'),

            'videoSrc' => PageInfo::where('category', 'what i do video src')->first()->value,
            'videoDescription' => PageInfo::where('category', 'what i do video description')->first()->value,
            'videoImgSrc' => PageInfo::where('category', 'what i do video img src')->first()->value,
            'videoImgAlt' => PageInfo::where('category', 'what i do video img alt')->first()->value,

            'mySignatureWorks' => About::where('category', 'signature')->orderBy('order_id')->get(),
            'mediaAboutMes' => About::where('category', 'media')->orderBy('order_id')->get(),

            'quotes' => PageInfo::where('category', 'quote')->get(),

            'portfolioTitle' => PageInfo::where('category', 'portfolio title')->first()->value,
            'portfolios' => Portfolio::orderBy('order_id')->get(),

            'contactMeTitle' => PageInfo::where('category', 'contact me title')->first()->value,

            'copyright' => PageInfo::where('category', 'copyright')->first()->value,
        ]);
    }


    /*
        If there is more then 1 image for particular category ? return random image from available
    */
    public function getImage($category){
        $images = DoImage::where('category', $category)->get();
        if (isset($images) && $images->count()>0) {
            return $images[random_int(0, $images->count() - 1)];
        } else {
            return null;
        }
    }
}
