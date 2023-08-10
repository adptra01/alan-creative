<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
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

    $cartData = Cart::content()->toArray(); // Konversi data cart menjadi array
    Cart::instance('default')->store($this->identifier);

    // Kirim data cart dan identifier
    $this->emit('order_placed', ['identifier' => $this->identifier, 'cartData' => $cartData]);

    // Reset keranjang dan emit event
    Cart::destroy();
    $this->emit('cart_updated');

    // Reset form input
    $this->identifier = '';
    session()->flash('success', 'Order successfully placed.');
}


}
