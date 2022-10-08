<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopController extends Controller
{
    public function __invoke()
    {
        $products=Product::all();
        return view('shop.index',compact('products'));
    }
}
