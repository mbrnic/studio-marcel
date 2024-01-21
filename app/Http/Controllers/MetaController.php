<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PageInfo;
use Illuminate\View\View;

class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metas = PageInfo::where('category', 'meta description')
            ->orWhere('category', 'meta keywords')->get();
        
        return view('admin.meta', [
            'metas' => $metas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('admin.meta.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('admin.meta.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.meta.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('admin.meta.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'meta_value' => 'required|min:5',
        ]);

        $meta = PageInfo::find($id);
        $meta->value = $request->meta_value;
        $meta->save();

        return redirect()->back()->with('message', "Meta podatak uspješno promijenjen.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('admin.meta.index');
    }
}
