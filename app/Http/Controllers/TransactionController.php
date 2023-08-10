<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function print($slug)
    {
        $transactions = Transaction::where('order_code', $slug)->get();

        return view('print', [
            'transactions' => $transactions
        ]);
    }
}
