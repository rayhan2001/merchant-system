<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('merchant.category.index', compact('categories'));
    }

    public function create()
    {
        $stores = Store::all();
        return view('merchant.category.create', compact('stores'));
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->store_id = $request->store_id;
        $category->save();

        return redirect()->route('category.list');
    }
}
