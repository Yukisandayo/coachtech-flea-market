<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentMethodDisplay extends Component
{
    public $paymentMethod;

    public function mount($paymentMethod = '')
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function render()
    {
        return view('livewire.payment-method-display');
    }
}