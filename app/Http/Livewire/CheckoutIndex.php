<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CheckoutIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.checkout-index', [
            'products' => $this->search == null ? Product::paginate(6) : Product::where('name', 'like', '%'.$this->search.'%')->paginate(6)
        ]);
    }
}
