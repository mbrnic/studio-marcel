<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AkaString;
use App\Models\PageInfo;
use App\Models\Portfolio;
use App\Models\GalleryItem;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MoveController extends Controller
{
    public function index ($category, $order_id, $where)
    {
        $backRoute = "home.index";

        /*
            Moving Aka or Portfolio based on their order_id
        */
        if ( $category == 'aka' ) {
            $model = new AkaString;
            $backRoute = "admin.aka.index";
            $move = $this->changeValuesAkaOrPortfolio($model, $order_id, $where, $backRoute);

        } elseif ( $category == 'portfolio' ) {
            $model = new Portfolio;
            $backRoute = "admin.portfolio.index";
            $move = $this->changeValuesAkaOrPortfolio($model, $order_id, $where, $backRoute);


        /*
            Moving Signature or Media based on their order_id
        */
        } elseif ( $category == 'signature' || $category == 'media' ) {

            $model = new About;

            $model_1st = $model->where('category', $category)->where('order_id', $order_id)->first();
            if ( is_null($model_1st) ) { return redirect()->back()->with('error', "Pomicanje nije moguće."); }

            $orderId_1st = $model_1st->order_id;

            if ( $where == 'up' ) {
                $orderId_2nd = $orderId_1st - 1;
            } elseif ( $where == 'down' ) {
                $orderId_2nd = $orderId_1st + 1;
            } else {
                return redirect()->back()->with('error', "Pomicanje nije poznato.");
            }

            $model_2nd = $model->where('category', $category)->where('order_id', $orderId_2nd)->first();
            if ( is_null($model_2nd) ) { return redirect()->back()->with('error', "Pomicanje nije moguće."); }

            $model_1st->order_id = $orderId_2nd;
            $model_1st->save();

            $model_2nd->order_id = $orderId_1st;
            $model_2nd->save();

            return redirect()->back()->with('message', "Pomicanje uspješno obavljeno.");

        
        /*
            Moving Quote - basically deleting all quotes and then making them based on new order
            they do not have order_id value so it cannot be used
        */
        } elseif ( $category == 'quote' ) {

            $quotesListOld = PageInfo::where('category', 'quote')->get();
            $quotesListNew = [];

            for ($i = 0; $i < count($quotesListOld); $i++) {

                if ( $i == $order_id-1 && $order_id > 1 && $where == 'up' ) {
                    $quotesListNew[$i] = $quotesListOld[$i-1];
                    $quotesListNew[$i-1] = $quotesListOld[$i];
                } elseif ( $i == $order_id-1 && $order_id < count($quotesListOld) && $where == 'down' ) {
                    $quotesListNew[$i] = $quotesListOld[$i+1];
                    $quotesListNew[$i+1] = $quotesListOld[$i];
                    $i++;
                } else {
                    $quotesListNew[$i] = $quotesListOld[$i];
                }
                
            }

            foreach ( $quotesListOld as $quoteToDelete ) {
                $quote = PageInfo::find($quoteToDelete->id);
                $quote->delete();
            }

            foreach ( $quotesListNew as $quoteToCreate ) {
                PageInfo::create([
                    'category' => 'quote',
                    'value' => $quoteToCreate->value,
                ]);
            }

            return redirect()->back()->with('message', "Pomicanje uspješno obavljeno.");


        /*
            Moving Item inside of gallery by using realy id instead of order_id
            this is the best way to keep track of which-is-which category
        */
        } elseif ( $category == 'item' ) {

            $id = $order_id;
            $model_1st = GalleryItem::find($id);
            if ( is_null($model_1st) ) { return redirect()->back()->with('error', "Pomicanje nije moguće."); }

            $orderId_1st = $model_1st->order_id;
            $itemCategory = $model_1st->category;
            $itemCategoryId = $model_1st->category_id;

            if ( $where == 'up' ) {
                $orderId_2nd = $orderId_1st - 1;
            } elseif ( $where == 'down' ) {
                $orderId_2nd = $orderId_1st + 1;
            } else {
                return redirect()->back()->with('error', "Pomicanje nije poznato.");
            }

            $model_2nd = GalleryItem::where('category', $itemCategory)->where('category_id', $itemCategoryId)->where('order_id', $orderId_2nd)->first();
            if ( is_null($model_2nd) ) { return redirect()->back()->with('error', "Pomicanje nije moguće."); }

            $model_1st->order_id = $orderId_2nd;
            $model_1st->save();

            $model_2nd->order_id = $orderId_1st;
            $model_2nd->save();

            return redirect()->back()->with('message', "Pomicanje uspješno obavljeno.");
            
        
        } else {
            return redirect()->back()->with('error', "Pomicanje nije moguće.");
        }


        return redirect()->route($backRoute)->with($move[0], $move[1]);
    }


    /*
        Aka and Portfolio have the same database structure so similar logic can be used
    */
    public function changeValuesAkaOrPortfolio($model, $orderId_1st, $where, $backRoute)
    {
        $orderIdMax = $model->count();

        $model_1st = $model->where('order_id', $orderId_1st)->first();
        if ( is_null($model_1st) ) { return redirect()->route($backRoute)->with('error', "Pomicanje nije moguće."); }

        if ( $where == 'up' ) {
            if ( $orderId_1st < 2 ) {
                return ['error', "Pomicanje nije moguće."];
            } else {
                $orderId_2nd = $orderId_1st - 1;
            }
        } elseif ( $where == 'down' ) {
            if ( $orderId_1st >= $orderIdMax ) {
                return ['error', "Pomicanje nije moguće."];
            } else {
                $orderId_2nd = $orderId_1st + 1;
            }
        } else {
            return ['error', "Pomicanje nije poznato."];
        }

        $model_2nd = $model->where('order_id', $orderId_2nd)->first();
        if ( is_null($model_2nd) ) { return ['error', "Pomicanje nije moguće."]; }

        $model_1st->order_id = $orderId_2nd;
        $model_1st->save();

        $model_2nd->order_id = $orderId_1st;
        $model_2nd->save();

        return ['message', "Pomicanje uspješno obavljeno."];
    }

}
