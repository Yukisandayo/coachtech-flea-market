<div class="product-grid">
    @foreach ($products as $product)
        <div class="product-card">
            <a href="{{url('/product/' . $product['id'])}}"  class="product-detail--form">
                <img src="{{ asset('storage/products/' . $product->image) }}" alt="商品画像">
                <p>{{ $product->name }}</p>
            </a>
            <p>{{ $product->is_sold ? 'Sold' : '' }}</p>
        </div>
    @endforeach
</div>
