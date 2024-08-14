<?php

namespace App\Http\Controllers;

use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // $products = Product::with('brand')->get();
        // dd($products);

        return view('frontend.index', compact('products'));
    }
}
