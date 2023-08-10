<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartProducts extends Component
{
    protected $listeners = ['cart_updated' => 'render'];

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
}
