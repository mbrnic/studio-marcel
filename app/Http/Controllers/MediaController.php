<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\About;
use Illuminate\View\View;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.media', [
            'medias' => About::where('category', 'media')->orderBy('order_id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('admin.media.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'list_title' => '',
            'name' => 'required|min:5',
            'subtitle' => 'required|min:5',
            'description' => 'required|min:10',
        ]);

        $maxOrder = About::where('category', 'media')->orderBy('order_id', 'DESC')->first();

        if ( isset($maxOrder) ) {
            $maxOrderId = $maxOrder->order_id;
        } else {
            $maxOrderId = 0;
        }

        About::create([
            'category' => 'media',
            'list_title' => $request->list_title,
            'title' => $request->name,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'order_id' => $maxOrderId + 1,
        ]);

        return redirect()->back()->with('message', "Media uspješno dodan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.media.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('admin.media.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'list_title' => '',
            'name' => 'required|min:5',
            'subtitle' => 'required|min:5',
            'description' => 'required|min:10',
        ]);

        $media = About::find($id);

        if ( isset($media) ) {
            $media->list_title = $request->list_title;
            $media->title = $request->name;
            $media->subtitle = $request->subtitle;
            $media->description = $request->description;
            $media->save();
            return redirect()->back()->with('message', "Media uspješno promijenjen.");
        } else {
            return redirect()->back()->with('error', "Media nije pronađen.");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $media = About::find($id);

        if ( isset($media) ) {
            $order_id = $media->order_id;
            $media->delete();
            $this->reOrderIds($order_id);
            return redirect()->back()->with('message', "Media uspješno obrisan.");
        } else {
            return redirect()->back()->with('error', "Media nije pronađen.");
        }
        
    }


    /*
        Cascading all order_id -> call it after destroying data in database
    */
    public function reOrderIds($order_id)
    {
        $medias = About::where('category', 'media')->get();
        
        foreach ($medias as $media) {
            if ( $media->order_id > $order_id ) {
                $media->order_id--;
                $media->save();
            }
        }
    }
}
