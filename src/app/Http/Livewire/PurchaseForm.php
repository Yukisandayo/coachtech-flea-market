<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class PurchaseForm extends Component
{
    public Product $product;
    public $selectedPaymentMethod = '';

    protected $listeners = ['paymentMethodUpdated'];

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function paymentMethodUpdated($paymentMethod)
    {
        $this->selectedPaymentMethod = $paymentMethod;
    }

    public function purchase()
    {
        // ここに購入処理を記述します
        dd('購入処理', $this->product->id, $this->selectedPaymentMethod);
    }

    public function render()
    {
        return view('livewire.purchase-form');
    }
}