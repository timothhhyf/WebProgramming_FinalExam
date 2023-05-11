<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Item;

class ItemController extends Controller
{
    //
    //see item lists
    public function home(){
        $page = request()->query('page', 1);
        $item = Item::paginate(10, ['*'], 'page', $page);
        return view('contents.home', ['item' => $item]);
    }

    //item detail
    public function itemDetail(Request $request){
        $itemDetail = Item::find($request->id);
        return view('contents.itemdetail', ['itemDetail' => $itemDetail]);
    }
}
