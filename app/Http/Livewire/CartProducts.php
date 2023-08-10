<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CartProducts extends Component
{
    protected $listeners = ['cart_updated' => 'render'];
    public $identifier = '';
    public $status = 'idle'; // 'idle', 'success', 'error'


    public function render()
    {
        $cart = Cart::content();

        return view('livewire.cart-products', [
            'cart' => $cart
        ]);
    }

    public function addToCart($rowId)
    {
        Cart::update($rowId, ['qty' => 1]);
        $this->emit('cart_updated');
    }

    public function incrementQty($rowId)
    {
        $cartItem = Cart::get($rowId);
        $newQty = $cartItem->qty + 1;

        Cart::update($rowId, $newQty);
        $this->emit('cart_updated');
    }

    public function decrementQty($rowId)
    {
        $cartItem = Cart::get($rowId);

        if ($cartItem->qty > 1) {
            $newQty = $cartItem->qty - 1;
            Cart::update($rowId, $newQty);
            $this->emit('cart_updated');
        }
    }

    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        $this->emit('cart_updated');
    }

    // public function cartCheckout()
    // {
    //     // Validasi input
    //     $this->validate([
    //         'identifier' => 'required|string|unique:shoppingcart,identifier',
    //     ]);

    //     if (Cart::count() === 0) {
    //         $this->status = 'error';
    //         session()->flash('gagal', 'Your shopping cart is empty.');
    //         return;
    //     }

    //     Cart::instance('default')->store($this->identifier);


    //     // Reset keranjang dan emit event
    //     Cart::destroy();
    //     $this->emit('cart_updated');

    //     // Reset form input
    //     $this->identifier = '';
    //     session()->flash('success', 'Order successfully placed.');
    // }

    public function cartCheckout()
    {
        // Validasi input
        $this->validate([
            'identifier' => 'required|string|unique:shoppingcart,identifier',
        ]);

        if (Cart::count() === 0) {
            $this->status = 'error';
            session()->flash('gagal', 'Your shopping cart is empty.');
            return;
        }

        // Simpan kode unik untuk order
        $orderCode = 'ORD-' . $this->identifier . '-' . now()->format('YmdHis');

        // Simpan data transaksi untuk setiap item dalam keranjang
        foreach (Cart::content() as $cartItem) {
            Transaction::create([
                'product_id' => $cartItem->id,
                'qty' => $cartItem->qty,
                'total' => $cartItem->price * $cartItem->qty,
                'customer' => $this->identifier,
                'order_code' => $orderCode,
            ]);

        }

        $this->emit('order_placed', $orderCode);


        // Reset keranjang dan emit event
        Cart::destroy();
        $this->emit('cart_updated');

        // Reset form input
        $this->identifier = '';
        session()->flash('success', 'Order successfully placed.');
    }


}
