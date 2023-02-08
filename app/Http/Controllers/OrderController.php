<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function add($item_id) {
        $item = Item::find($item_id);
        $account_id = auth()->user()->account_id;
        Order::create([
            'item_id' => $item_id,
            'account_id' => $account_id,
            'price' => $item->price,
        ]);
        return redirect('/');
    }

    public function show() {
        $id = auth()->user()->account_id;
        // $orders = Order::query()->where('account_id','=',auth()->user()->account_id)->get();
        // dd(Item::find(1)->orders);
        // dd($orders[1]);
        $account = Account::find($id);
        $orders = $account->items;
        return view('item.cart', compact('orders'));
    }

    public function checkout() {
        $id = auth()->user()->account_id;
        Order::where('account_id',$id)->delete();
        return view('item.success');
    }

    public function delete($id) {
        $account_id = auth()->user()->account_id;
        Order::query()->where('account_id',$account_id)->where('item_id', $id)->delete();
        return back();
    }
}
