<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class PrintBill extends Component
{
    protected $listeners = ['order_placed' => 'handleOrderPlaced'];
    public $identifier = '';
    public $cartData = [];

    public function handleOrderPlaced($data)
    {
        $this->identifier = $data['identifier'];
        $this->cartData = $data['cartData'];
        $this->render();
    }

    public function render()
    {
        return view('livewire.print-bill', [
            'cartData' => $this->cartData,
            'identifier' => $this->identifier,
        ]);
    }
}
