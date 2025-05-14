<div class="product-grid">
    @foreach ($purchasedProducts as $purchasedProduct)
        <div class="product-card">
            <img src="{{ asset('storage/products/' . $purchasedProduct->image) }}" alt="商品画像">
            <p>{{ $purchasedProduct->name }}</p>
            <p>{{ $purchasedProduct->is_sold ? 'Sold' : '' }}</p>
        </div>
    @endforeach
</div>