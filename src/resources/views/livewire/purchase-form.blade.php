<form class="purchase-form" wire:submit.prevent="purchase" novalidate>
    @csrf
    <div class="purchase-item">
        <div class="purchase__item--image">
            <img src="{{ asset('storage/products/' . $product->image) }}"  alt="詳細画像" class="img-content" style="max-width: 200px; max-height: 200px;">
        </div>
        <div class="purchase__item--name">
            <strong>{{ $product->name }}</strong>
        </div>
        <div class="purchase__item--price">
            <span>{{ $product->price }}</span>
        </div>
    </div>
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">支払い方法</span>
        </div>
        <div class="form__group-content">
            <div class="form__input--select">
                <livewire:payment-method-dropdown />
            </div>
            <div class="form__error">
                @error('payment_method')
                {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">配送先</span>
            <div class="form__button--to-edit">
                <a href="{{url('/address/edit')}}" class="to-edit__button">変更する</a>
            </div>
        </div>
        <div class="form__group-content">
            <div class="form__input--text">
            @php
                $profile = optional(optional($product)->user)->profile;
            @endphp

            @if ($profile && $profile->postal_code && $profile->address)
                <p>{{ $profile->postal_code }}</p>
                <p>{{ $profile->address }}</p>
            @else
                <p>
                @if (!$product)
                    商品データが見つかりません。
                @elseif (!optional($product)->user)
                    この商品に紐づくユーザーが存在しません。
                @else
                    このユーザーのプロフィール情報が登録されていません。
                @endif
                </p>
            @endif
            </div>
        </div>
    </div>
    <div class="purchase-form__summary">
        <div class="purchase-form__subtotal">
            <span>商品代金</span>
            <span>{{ $product->price }}</span>
        </div>
        <div class="purchase-form__payment">
            <livewire:payment-method-display :paymentMethod="$selectedPaymentMethod" />
        </div>
    </div>
    <div class="form__button">
        <button class="form__button-submit" type="submit">購入する</button>
    </div>
</form>