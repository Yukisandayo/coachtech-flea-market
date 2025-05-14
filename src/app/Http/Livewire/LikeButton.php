<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class LikeButton extends Component
{
    public Product $product;
    public bool $isLiked;
    public int $likeCount;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->isLiked = Auth::check() ? $this->product->likes()->where('user_id', Auth::id())->exists() : false;
        $this->likeCount = $this->product->likes()->count();
    }

    public function toggleLike()
    {
        if (!Auth::check()) {
            return ;
        }

        if ($this->isLiked) {
            $this->product->likes()->where('user_id', Auth::id())->delete();
            $this->isLiked = false;
        } else {
            $this->product->likes()->create(['user_id' => Auth::id()]);
            $this->isLiked = true;
        }

        $this->likeCount = $this->product->likes()->count();
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
