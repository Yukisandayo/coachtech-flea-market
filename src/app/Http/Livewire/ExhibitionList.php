<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ExhibitionList extends Component
{
    public $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        $products = Product::where('name', 'like', "%{$this->search}%")
            ->where('user_id', '=', Auth::id())
            ->get();

        return view('livewire.exhibition-list', compact('products'));
    }
}
