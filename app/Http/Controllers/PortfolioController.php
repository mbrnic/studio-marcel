<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PageInfo;
use App\Models\Portfolio;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.portfolio', [
            'portfolioValues' => PageInfo::where('category', 'portfolio title')->get(),
            'portfolios' => Portfolio::orderBy('order_id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('admin.portfolio.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:5',
        ]);

        $maxOrder = Portfolio::orderBy('order_id', 'DESC')->first();

        if ( isset($maxOrder) ) {
            $maxOrderId = $maxOrder->order_id;
        } else {
            $maxOrderId = 0;
        }

        Portfolio::create([
            'title' => $request->name,
            'order_id' => $maxOrderId + 1,
        ]);

        return redirect()->back()->with('message', "Portfolio uspješno dodan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.portfolio.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('admin.portfolio.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        /*
            @case ('portfolio title')
        */
        if (isset($request->text_value)) {

            $this->validate($request,[
                'text_value' => 'required|min:5',
            ]);

            $portfolioValue = PageInfo::find($id);

            if ( isset($portfolioValue) ) {
                $portfolioValue->value = $request->text_value;
                $portfolioValue->save();
                return redirect()->back()->with('message', "Tekst podatak uspješno promijenjen.");
            } else {
                return redirect()->back()->with('error', "Tekst podatak nije pronađen.");
            }
            

        /*
            Request is to change portfolio
        */
        } elseif (isset($request->name)) {

            $this->validate($request,[
                'name' => 'required|min:5',
            ]);

            $portfolio = Portfolio::find($id);

            if ( isset($portfolio) ) {
                $portfolio->title = $request->name;
                $portfolio->save();
                return redirect()->back()->with('message', "Portfolio uspješno promijenjen.");
            } else {
                return redirect()->back()->with('error', "Portfolio nije pronađen.");
            }
            
        }

        return redirect()->back()->with('error', "Nije moguće promijeniti. Nepoznat zahtjev.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = Portfolio::find($id);
            
        if ( isset($portfolio) ) {
            $order_id = $portfolio->order_id;
            $portfolio->delete();
            $this->reOrderIds($order_id);
            return redirect()->back()->with('message', "Portfolio uspješno obrisan.");
        } else {
            return redirect()->back()->with('error', "Portfolio nije pronađen.");
        }
        
    }


    /*
        Cascading all order_id -> call it after destroying data in database
    */
    public function reOrderIds($order_id)
    {
        $portfolios = Portfolio::get();
        
        foreach ($portfolios as $portfolio) {
            if ( $portfolio->order_id > $order_id ) {
                $portfolio->order_id--;
                $portfolio->save();
            }
        }
    }
}
