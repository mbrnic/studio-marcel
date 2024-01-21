<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PageInfo;
use Illuminate\View\View;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.quote', [
            'quotes' => PageInfo::where('category', 'quote')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('admin.quote.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'quote' => 'required|min:15',
        ]);

        PageInfo::create([
            'category' => 'quote',
            'value' => $request->quote,
        ]);
        
        return redirect()->back()->with('message', "Citat uspješno dodan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.quote.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('admin.quote.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'quote' => 'required|min:15',
        ]);
        
        $quote = PageInfo::find($id);

        if ( isset($quote) ) {
            $quote->value = $request->quote;
            $quote->save();
            return redirect()->back()->with('message', "Citat uspješno promijenjen.");
        } else {
            return redirect()->back()->with('error', "Citat nije pronađen.");
        }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quote = PageInfo::find($id);

        if ( isset($quote) ) {
            $quote->delete();
            return redirect()->back()->with('message', "Citat uspješno obrisan.");
        } else {
            return redirect()->back()->with('error', "Citat nije pronađen.");
        }
        
    }
}
