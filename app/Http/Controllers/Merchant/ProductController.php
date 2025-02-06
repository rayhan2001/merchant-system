<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('merchant.product.index', compact('products'));
    }

    public function create()
    {
        $stores = Store::all();
        $categories = Category::all();
        return view('merchant.product.create', compact('stores', 'categories'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->store_id = $request->store_id;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('product.list');
    }
}
