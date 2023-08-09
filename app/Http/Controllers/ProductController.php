<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index', [
            'products' => Product::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        
    }
}
