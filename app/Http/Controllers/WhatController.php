<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PageInfo;
use App\Models\DoImage;
use Illuminate\View\View;

use Intervention\Image\Laravel\Facades\Image;

class WhatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whats = PageInfo::where('category', 'do photography text')
            ->orWhere('category', 'do filming text')
            ->orWhere('category', 'do video snapping text')
            ->orWhere('category', 'what i do video src')
            ->orWhere('category', 'what i do video description')
            ->orWhere('category', 'what i do video img src')
            ->orWhere('category', 'what i do video img alt')->get();

        return view('admin.what', [
            'whats' => $whats,
            'whatDoImages' => DoImage::get(),

            // data for category selection dropdown menu
            'doPhotographyText' => PageInfo::where('category', 'do photography text')->first()->value,
            'doFilmingText' => PageInfo::where('category', 'do filming text')->first()->value,
            'doVideoSnappingText' => PageInfo::where('category', 'do video snapping text')->first()->value,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('admin.what.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|mimes:png,jpeg,jpg',
            'category' => 'required',
            'alt_text' => 'required|min:5',
        ]);


        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('/item');
        $image->move($imagePath, $imageName);

        $image = Image::read($imagePath . '/' . $imageName);
        $image->scale(520, 533);
        $image->save($imagePath . '/' . $imageName);


        DoImage::create([
            'category' => $request->category,
            'src' => $imageName,
            'alt' => $request->alt_text,
        ]);

        return redirect()->back()->with('message', "Slika uspješno dodana.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.what.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('admin.what.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*
            @case ('do photography text')
            @case ('do filming text')
            @case ('do video snapping text')
            @case ('what i do video img alt')
        */
        if (isset($request->text_value)) {
            
            $this->validate($request,[
                'text_value' => 'required|min:5',
            ]);

            $what = PageInfo::find($id);

                if ( isset($what) ) {
                    $what->value = $request->text_value;
                    $what->save();
                    return redirect()->back()->with('message', "Tekst podatak uspješno promijenjen.");
                } else {
                    return redirect()->back()->with('error', "Tekst podatak nije pronađen.");
                }
            

        /*
            @case ('what i do video src') - upload MP4
        */
        } elseif (isset($request->new_video)) {

            $this->validate($request,[
                'new_video' => 'required|mimes:mp4',
            ]);

            $video = $request->file('new_video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $videoPath = public_path('/item');
            $video->move($videoPath, $videoName);

            $what = PageInfo::find($id);

            if ( isset($what) ) {
                $what->value = $videoName;
                $what->save();
                return redirect()->back()->with('message', "Video podatak uspješno promijenjen.");
            } else {
                return redirect()->back()->with('error', "Video podatak nije pronađen.");
            }
            

        /*
            @case ('what i do video src') - Youtube link
        */
        } elseif (isset($request->video_value)) {

            $this->validate($request,[
                'video_value' => 'required|min:35',
            ]);

            $what = PageInfo::find($id);

            if ( isset($what) ) {
                $what->value = $request->video_value;
                $what->save();
                return redirect()->back()->with('message', "Youtube video podatak uspješno promijenjen.");
            } else {
                return redirect()->back()->with('error', "Youtube video podatak nije pronađen.");
            }
            

        /*
            @case ('what i do video img src') - upload PNG, JPEG or JPG
        */
        } elseif (isset($request->new_image)) {

            $this->validate($request,[
                'new_image' => 'required|mimes:png,jpeg,jpg',
            ]);

            $image = $request->file('new_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('/item');
            $image->move($imagePath, $imageName);

            $what = PageInfo::find($id);

            if ( isset($what) ) {
                $what->value = $imageName;
                $what->save();
                return redirect()->back()->with('message', "Slika podatak uspješno promijenjen.");
            } else {
                return redirect()->back()->with('error', "Slika podatak nije pronađen.");
            }


        /*
            @case ('what i do video img src') - Youtube link
        */
        } elseif (isset($request->image_value)) {

            $this->validate($request,[
                'image_value' => 'required|min:35',
            ]);

            $what = PageInfo::find($id);

            if ( isset($what) ) {
                $what->value = $request->image_value;
                $what->save();
                return redirect()->back()->with('message', "Youtube slika podatak uspješno promijenjen.");
            } else {
                return redirect()->back()->with('error', "Youtube slika podatak nije pronađen.");
            }
            

        /*
            @case ('what i do video description')
        */
        } elseif (isset($request->description_value)) {

            $this->validate($request,[
                'description_value' => 'required|min:20',
            ]);

            $what = PageInfo::find($id);

            if ( isset($what) ) {
                $what->value = $request->description_value;
                $what->save();
                return redirect()->back()->with('message', "Opisni podatak uspješno promijenjen.");
            } else {
                return redirect()->back()->with('error', "Opisni podatak nije pronađen.");
            }
            

        /*
            Request is to change DoImage
        */
        } else {

            $this->validate($request,[
                'image' => 'mimes:png,jpeg,jpg',
                'category' => 'required',
                'alt_text' => 'required|min:5',
            ]);

            $whatDoImage = DoImage::find($id);

            if ( isset($whatDoImage) ) {

                /*
                    replacement for current image is sent, upload it
                */
                if ( isset($request->image) ) {
                    $image = $request->file('image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $imagePath = public_path('/item');
                    $image->move($imagePath, $imageName);
                    $whatDoImage->src = $imageName;
                }

                $howManyWillLeftInCategory = DoImage::where('category', $whatDoImage->category)->get()->count() - 1;
                if ( $howManyWillLeftInCategory < 1 ) {
                    return redirect()->back()->with('error', "Nije moguća promjena. Mora biti najmanje jedna slika po kategoriji.");
                }

                $whatDoImage->category = $request->category;
                $whatDoImage->alt = $request->alt_text;
                $whatDoImage->save();

                return redirect()->back()->with('message', "Podaci uspješno promijenjeni.");

            } else {
                return redirect()->back()->with('error', "Podaci nisu pronađeni. Nepoznat zahtjev.");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $whatDoImage = DoImage::find($id);

        if ( isset($whatDoImage) ) {

            $count = DoImage::where('category', $whatDoImage->category)->get()->count();
            if ( $count == 1 ) {
                return redirect()->back()->with('error', "Nije moguće brisanje. Mora biti najmanje jedna slika po kategoriji.");
            }

            $whatDoImage->delete();

            return redirect()->back()->with('message', "Slika uspješno obrisana.");

        } else {
            return redirect()->back()->with('error', "Slika nije pronađena.");
        }
        
    }
}
