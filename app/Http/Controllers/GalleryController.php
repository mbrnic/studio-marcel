<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GalleryItem;
use App\Models\About;
use App\Models\Portfolio;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index ($category, $order_id)
    {
        if ( $category == 'signature' || $category == 'media' ) {

            $model = About::where('category', $category)->where('order_id', $order_id)->first(); 
        
        } elseif ( $category == 'portfolio' ) {

            $model = Portfolio::where('order_id', $order_id)->first();

        }


        if ( is_null($model) ) { abort(404); };


        return view('admin.gallery', [
            'category' => $category,
            'category_id' => $order_id,
            'items' => $this->getItems($category, $model),
            'headline_id' => $this->getHeadline($model),
        ]);
    }



    public function getItems($category, $model) {

        return GalleryItem::where('category', $category)->where('category_id', $model->id)->orderBy('order_id')->get();

    }


    public function getHeadline($model) {
        
        if ( isset($model->gallery_item_id) ) {
            return $model->gallery_item_id;
        } else {
            return null;
        }

    }

}
