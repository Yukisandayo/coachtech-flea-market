<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Like;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class Mylist extends Component
{
    public $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        if (!Auth::check()) {
            $products = collect();
        } else {
            $products = Like::where('user_id', Auth::id())
                ->with(['product.purchases'])
                ->whereHas('product', function($query) {
                    $query->where('name', 'like', "%{$this->search}%")
                        ->where('user_id', '!=', Auth::id());
                })
                ->get()
                ->pluck('product');
        }

        return view('livewire.mylist', compact('products'));
    }
}
