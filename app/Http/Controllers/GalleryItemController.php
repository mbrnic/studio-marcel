<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GalleryItem;
use App\Models\About;
use App\Models\Portfolio;
use Illuminate\View\View;

use Intervention\Image\Laravel\Facades\Image;

class GalleryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
            Gallery item is going to be uploaded file - Image or Video
        */
        if (isset($request->file_upload)) {

            $this->validate($request,[
                'category_name' => 'required',
                'category_order_id' => 'required',
                'file_upload' => 'mimes:png,jpeg,jpg,mp4',
                'alt_text' => 'required|min:5',
            ]);

            $maxOrderId = $this->getMaxItemOrderId($request);

            if (isset($maxOrderId)) {

                $image = $request->file('file_upload');
                $imageExtension = $image->getClientOriginalExtension();
                $imageName = time() . '.' . $imageExtension;
                $imagePath = public_path('/item');
                $image->move($imagePath, $imageName);

                /*
                    Shrink the image
                */
                if ( $imageExtension == '.png' || $imageExtension == '.jpeg' || $imageExtension == '.jpg' ) {

                    $image = Image::read($imagePath . '/' . $imageName);
                    $image->scale(1000, 1000);
                    $image->save($imagePath . '/' . $imageName);

                }

                GalleryItem::create([
                    'category' => $request->category_name,
                    'category_id' => $this->getCategoryId($request),
                    'src' => $imageName,
                    'alt' => $request->alt_text,
                    'order_id' => $maxOrderId + 1,
                ]);
                

                return redirect()->back()->with('message', "Zapis uspješno dodan.");

            } else {
                return redirect()->back()->with('error', "Kategorija nije pronađena.");
            }


        /*
            Gallery item is going to be Youtube link
        */
        } elseif (isset($request->file_link)) {

            $this->validate($request,[
                'category_name' => 'required',
                'category_order_id' => 'required',
                'file_link' => 'min:25',
                'alt_text' => 'required|min:5',
            ]);

            $maxOrderId = $this->getMaxItemOrderId($request);

            if (isset($maxOrderId)) {

                GalleryItem::create([
                    'category' => $request->category_name,
                    'category_id' => $this->getCategoryId($request),
                    'src' => $request->file_link,
                    'alt' => $request->alt_text,
                    'order_id' => $maxOrderId + 1,
                ]);

                return redirect()->back()->with('message', "Zapis uspješno dodan.");

            } else {
                return redirect()->back()->with('error', "Kategorija nije pronađena.");
            }

        } else {
            return redirect()->back()->with('error', "Greška kod zahtjeva.");
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*
            Gallery item is changing to be uploaded file - Image or Video
        */
        if (isset($request->file_upload)) {

            $this->validate($request,[
                'category_name' => 'required',
                'category_order_id' => 'required',
                'file_upload' => 'mimes:png,jpeg,jpg,mp4',
                'alt_text' => 'required|min:5',
            ]);


            $item = GalleryItem::find($id);

            if ( isset($item) ) {

                $image = $request->file('file_upload');
                $imageExtension = $image->getClientOriginalExtension();
                $imageName = time() . '.' . $imageExtension;
                $imagePath = public_path('/item');
                $image->move($imagePath, $imageName);

                /*
                    Shrink the image
                */
                if ( $imageExtension == '.png' || $imageExtension == '.jpeg' || $imageExtension == '.jpg' ) {

                    $image = Image::read($imagePath . '/' . $imageName);
                    $image->scale(1000, 1000);
                    $image->save($imagePath . '/' . $imageName);

                }

                $item->src = $imageName;
                $item->alt = $request->alt_text;
                $item->save();

                return redirect()->back()->with('message', "Zapis uspješno promijenjen.");

            } else {
                return redirect()->back()->with('error', "Zapis nije pronađen.");
            }


        /*
            Gallery item is changing to be Youtube link
        */
        } elseif (isset($request->file_link)) {

            $this->validate($request,[
                'category_name' => 'required',
                'category_order_id' => 'required',
                'file_link' => 'min:25',
                'alt_text' => 'required|min:5',
            ]);


            $item = GalleryItem::find($id);

            if ( isset($item) ) {
                $item->src = $request->file_link;
                $item->alt = $request->alt_text;
                $item->save();
                return redirect()->back()->with('message', "Zapis uspješno promijenjen.");
            } else {
                return redirect()->back()->with('error', "Zapis nije pronađen.");
            }
            

        } else {
            return redirect()->back()->with('error', "Greška kod zahtjeva.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $galleryItem = GalleryItem::find($id);

        if ( isset($galleryItem) ) {
            $category = $galleryItem->category;
            $category_id = $galleryItem->category_id;
            $order_id = $galleryItem->order_id;
            $galleryItem->delete();
            $this->reOrderIds($category, $category_id, $order_id);
            return redirect()->back()->with('message', "Zapis uspješno obrisan.");
        } else {
            return redirect()->back()->with('error', "Zapis nije pronađen.");
        }
        
    }


    /*
        Returning max value from order_id if exists, or null -> call it when storing in database
    */
    public function getMaxItemOrderId($request) {
        if ( $request->category_name == 'signature' || $request->category_name == 'media' ) {
            $categoryToCheck = About::where('category', $request->category_name)->where('order_id', $request->category_order_id)->first();
        } elseif ( $request->category_name == 'portfolio' ) {
            $categoryToCheck = Portfolio::where('order_id', $request->category_order_id)->first();
        }

        if (isset($categoryToCheck)) {
            $query = GalleryItem::where('category', $request->category_name)->where('category_id', $categoryToCheck->id)->orderBy('order_id', 'DESC')->first();
            if (isset($query)) {
                return $query->order_id;
            } else {
                return null;
            }
            
        } else {
            return null;
        }
    }


    /*
        Returning category_id from requested name and order_id -> call it when storing in database
    */
    public function getCategoryId($request) {
        if ( $request->category_name == 'signature' || $request->category_name == 'media') {
            return About::where('category', $request->category_name)->where('order_id', $request->category_order_id)->first()->id;
        } elseif ( $request->category_name == 'portfolio') {
            return Portfolio::where('order_id', $request->category_order_id)->first()->id;
        }
    }


    /*
        Cascading all order_id -> call it after destroying data in database
    */
    public function reOrderIds($category, $category_id, $order_id){
        
        $items = GalleryItem::where('category', $category)->where('category_id', $category_id)->get();

        foreach ($items as $item) {

            if ( $item->order_id > $order_id ) {
                $item->order_id--;
                $item->save();
            }

        }  
    }
}
