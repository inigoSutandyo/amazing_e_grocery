<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function home() {
        $items = Item::paginate(10);
        return view('main.home', compact('items'));
    }

    public function detail($locale, $item_id) {
        $item = Item::find($item_id);
        // dd($item);
        return view('item.detail', compact('item'));
    }
}
