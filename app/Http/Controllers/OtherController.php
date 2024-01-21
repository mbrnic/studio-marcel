<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PageInfo;
use Illuminate\View\View;

class OtherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $others = PageInfo::where('category', 'contact me title')
            ->orWhere('category', 'copyright')->get();

        return view('admin.other', [
            'others' => $others,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('admin.other.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('admin.other.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.other.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('admin.other.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'text_value' => 'required|min:5',
        ]);

        $other = PageInfo::find($id);

        if ( isset($other) ) {
            $other->value = $request->text_value;
            $other->save();
            return redirect()->back()->with('message', "Ostali podatak uspješno promijenjen.");
        } else {
            return redirect()->back()->with('error', "Ostali podatak nije pronađen.");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('admin.other.index');
    }
}
