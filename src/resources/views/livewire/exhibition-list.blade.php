<div class="product-grid">
    @foreach ($products as $product)
        <div class="product-card">
            <img src="{{ asset('storage/products/' . $product->image) }}" alt="商品画像">
            <p>{{ $product->name }}</p>
            <p>{{ $product->is_sold ? 'Sold' : '' }}</p>
        </div>
    @endforeach
</div>