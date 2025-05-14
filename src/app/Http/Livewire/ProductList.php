<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class ProductList extends Component
{
    public $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        $products = Product::where('name', 'like', "%{$this->search}%")
            ->where('user_id', '!=', Auth::id())
            ->with('purchases')
            ->get();

        return view('livewire.product-list', compact('products'));
    }
}
