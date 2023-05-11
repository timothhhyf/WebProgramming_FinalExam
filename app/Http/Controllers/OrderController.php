<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function addItemToCart(Request $request){
        $newOrder = new Order;

        $itemId = $request->id;

        $newOrder->account_id = Auth::user()->id;
        $newOrder->item_id = $itemId;

        $newOrder->save();
        return redirect('/cart');
    }

    public function cartView()
    {
        $order = Order::where('account_id', 'LIKE', Auth::user()->id)->get();

        return view('contents.cart', [
            "order" => $order
        ]);
    }

    public function deleteOrder(Request $request){
        $order = Order::find($request->id);
        $order->delete();
        return redirect('/cart');
    }

    public function cartCheckOut(){
        Order::where('account_id', Auth::user()->id)->delete();
        return view('contents.trans-success');
    }
}
