<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('merchant.store.index', compact('stores'));
    }

    public function create()
    {
        return view('merchant.store.create');
    }

    public function store(Request $request)
    {
        $store = new Store();
        $store->name = $request->name;
        $store->save();

        return redirect()->route('store.list');
    }
}
