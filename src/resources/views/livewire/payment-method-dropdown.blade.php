<div>
    <label for="paymentMethod">支払い方法</label>
    <select wire:model="selectedPaymentMethod" id="paymentMethod" name="payment_method">
        <option value="">選択してください</option>
        @foreach ($availablePaymentMethods as $method)
            <option value="{{ $method }}">{{ $method }}</option>
        @endforeach
    </select>
</div>