<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class PurchasedList extends Component
{
    public $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        $purchasedProducts = Product::whereHas('purchases', function($query) {
            $query->where('user_id', '=', Auth::id());
        })
        ->where('name', 'like', "%{$this->search}%")
        ->where('user_id', '!=', Auth::id())
        ->with('purchases')
        ->get();

        return view('livewire.purchased-list', compact('purchasedProducts'));
    }
}
