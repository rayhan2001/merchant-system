<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $stores = Store::with(['categories.products'])->get();
        return view('shop.index', compact('stores'));
    }
}
