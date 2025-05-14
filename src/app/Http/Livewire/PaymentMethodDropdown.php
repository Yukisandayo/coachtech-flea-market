<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentMethodDropdown extends Component
{
    public $selectedPaymentMethod = '';
    public $availablePaymentMethods = ['カード支払い', 'コンビニ払い'];

    public function render()
    {
        return view('livewire.payment-method-dropdown');
    }

    public function updatedSelectedPaymentMethod($value)
    {
        $this->emitUp('paymentMethodUpdated', $value);
    }
}