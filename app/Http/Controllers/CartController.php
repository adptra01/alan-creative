<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $username = $request->input('username'); // Mengambil username dari input form

        // Menyimpan keranjang dengan instance default
        Cart::store($username);

        // Jika Anda ingin menyimpan keranjang dari instance tertentu, seperti 'wishlist'
        // Cart::instance('wishlist')->store($username);

        return redirect()->back()->with('success', 'Cart has been stored successfully.');
    }

}
