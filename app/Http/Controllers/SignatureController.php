<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\About;
use Illuminate\View\View;

class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.signature', [
            'signatures' => About::where('category', 'signature')->orderBy('order_id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('admin.signature.index');
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

        $maxOrder = About::where('category', 'signature')->orderBy('order_id', 'DESC')->first();

        if ( isset($maxOrder) ) {
            $maxOrderId = $maxOrder->order_id;
        } else {
            $maxOrderId = 0;
        }

        About::create([
            'category' => 'signature',
            'list_title' => $request->list_title,
            'title' => $request->name,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'order_id' => $maxOrderId + 1,
        ]);

        return redirect()->back()->with('message', "Signature uspješno dodan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.signature.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('admin.signature.index');
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

        $signature = About::find($id);

        if ( isset($signature) ) {
            $signature->list_title = $request->list_title;
            $signature->title = $request->name;
            $signature->subtitle = $request->subtitle;
            $signature->description = $request->description;
            $signature->save();
            return redirect()->back()->with('message', "Signature uspješno promijenjen.");
        } else {
            return redirect()->back()->with('error', "Signature nije pronađen.");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $signature = About::find($id);

        if ( isset($signature) ) {
            $order_id = $signature->order_id;
            $signature->delete();
            $this->reOrderIds($order_id);
            return redirect()->back()->with('message', "Signature uspješno obrisan.");
        } else {
            return redirect()->back()->with('error', "Signature nije pronađen.");
        }
        
    }


    /*
        Cascading all order_id -> call it after destroying data in database
    */
    public function reOrderIds($order_id)
    {
        $signatures = About::where('category', 'signature')->get();
        
        foreach ($signatures as $signature) {
            if ( $signature->order_id > $order_id ) {
                $signature->order_id--;
                $signature->save();
            }
        }
        
    }
}
