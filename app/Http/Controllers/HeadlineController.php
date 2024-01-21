<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GalleryItem;
use App\Models\About;
use App\Models\Portfolio;
use Illuminate\View\View;
use Illuminate\Support\Str;

class HeadlineController extends Controller
{
    public function index ($item_id)
    {
        $galleryItem = GalleryItem::find($item_id);
        if ( is_null($galleryItem) ) { return redirect()->back()->with('error', "Postavljanje naslovnice nije moguće. Nepoznat zapis."); }

        $itemCategory = $galleryItem->category;
        $itemCategoryId = $galleryItem->category_id;

        if ( $itemCategory == 'signature' || $itemCategory == 'media' ) {
            $model = About::where('category', $itemCategory)->where('id', $itemCategoryId)->first();
        } elseif ( $itemCategory == 'portfolio' ) {
            $model = Portfolio::where('id', $itemCategoryId)->first();
        } else {
            return redirect()->back()->with('error', "Postavljanje naslovnice nije moguće. Nepoznata kategorija.");
        }

        if ( $this->isPossible($item_id) ) {
            $model->gallery_item_id = $item_id;
            $model->save();
            return redirect()->back()->with('message', "Postavljanje naslovnice uspješno obavljeno.");
        } else {
            return redirect()->back()->with('error', "Postavljanje naslovnice nije moguće. Zapis nije prihvatljiv.");
        }
        
    }


    public function isPossible($item_id)
    {
        $itemToCheck = GalleryItem::find($item_id);
        if ( Str::contains($itemToCheck->src, '.mp4') ) {
            return false;
        } else {
            return true;
        }
    }
}
