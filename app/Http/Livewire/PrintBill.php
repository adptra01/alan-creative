<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class PrintBill extends Component
{
    public $identifier = '';
    public $transactions = [];

    protected $listeners = ['order_placed' => 'handleOrderPlaced'];

    public function handleOrderPlaced($orderCode)
    {
        $this->identifier = $orderCode;

        // Ambil data transaksi berdasarkan order_code
        $transactions = Transaction::where('order_code', $orderCode)->get();

        // Simpan data transaksi
        $this->transactions = $transactions;

        $this->render();
    }

    public function render()
    {
        return view('livewire.print-bill', [
            'transactions' => $this->transactions,
            'invoice' => $this->identifier,
        ]);
    }
}






