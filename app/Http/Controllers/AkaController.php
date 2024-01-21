<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AkaString;
use Illuminate\View\View;

class AkaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.aka', [
            'akaStrings' => AkaString::orderBy('order_id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('admin.aka.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:5',
        ]);

        $maxOrderId = AkaString::get()->count();

        AkaString::create([
            'name' => $request->name,
            'order_id' => $maxOrderId + 1,
        ]);
        
        return redirect()->back()->with('message', "Aka tekst uspješno dodan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.aka.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('admin.aka.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required|min:5',
        ]);
        
        $akaString = AkaString::find($id);

        if ( isset($akaString) ) {

            $akaString->name = $request->name;
            $akaString->save();

            return redirect()->back()->with('message', "Aka tekst uspješno promijenjen.");

        } else {

            return redirect()->back()->with('error', "Aka tekst nije pronađen.");

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $akaString = AkaString::find($id);

        if (!isset($akaString)) { return redirect()->back()->with('error', "Aka tekst nije pronađen."); }

        $order_id = $akaString->order_id;
        $akaString->delete();

        $this->reOrderIds($order_id);

        return redirect()->back()->with('message', "Aka tekst uspješno obrisan.");
    }

    public function reOrderIds($order_id)
    {
        $akaStrings = AkaString::get();
        
        foreach ($akaStrings as $akaString) {
            if ( $akaString->order_id > $order_id ) {
                $akaString->order_id--;
                $akaString->save();
            }
        }
    }
}
