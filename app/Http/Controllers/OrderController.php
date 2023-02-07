<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function add($locale, $item_id) {
        $item = Item::find($item_id);
        $account_id = auth()->user()->account_id;
        Order::create([
            'item_id' => $item_id,
            'account_id' => $account_id,
            'price' => $item->price,
        ]);
        return redirect('/');
    }

    public function show($locale) {
        $id = auth()->user()->account_id;
        // $orders = Order::query()->where('account_id','=',auth()->user()->account_id)->get();
        // dd(Item::find(1)->orders);
        // dd($orders[1]);
        $account = Account::find($id);
        $orders = $account->items;
        return view('item.cart', compact('orders'));
    }

    public function checkout($locale) {
        $id = auth()->user()->account_id;
        Order::where('account_id',$id)->delete();
        return redirect()->route('home', ['locale' => app()->getLocale()]);
    }
}
