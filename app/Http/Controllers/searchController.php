<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $product = $request->search;
        $products = Product::where('category', 'like', '%' . $product . '%')
            ->orWhere('name', 'like', '%' . $product . '%')
            ->paginate(10);
        return view('shop', compact('products'));
    }
}
