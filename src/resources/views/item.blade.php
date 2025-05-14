@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/item.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="product-page">
        <div class="product-image">
            <img src="{{ asset('storage/products/' . $product->image) }}"  alt="詳細画像" class="img-content">
        </div>
        <div class="product-details">
            <h2 class="product-name">{{ $product->name }}</h2>
            @if ($product->brand)
                <p class="brand">{{ $product->brand }}</p>
            @else
                <p></p>
            @endif
            <p class="price">{{ $product->price }}<span>（税込）</span></p>

            <div class="actions">
                @livewire('like-button', ['product' => $product])
                <i class="fas fa-comment"></i><span>{{ $product->comments->count() }}</span>
                <form action="/purchase/{{ $product->id }}" method="get" class="purchase-form">
                    @csrf
                    <button class="buy-button">購入手続きへ</button>
                </form>
            </div>

            <div class="product--description">
                <h3>商品説明</h3>
                <p>{{ $product->description }}</p>
            </div>

            <div class="product--info">
                <h3>商品の情報</h3>
                <strong>カテゴリー</strong>
                @foreach ($product->categories as $category)
                <p>{{$category->name}}</p>
                @endforeach
                <p><strong>商品の状態</strong>{{ $product->condition }}</p>
            </div>

            <div class="comments">
                <h3>コメント({{ $product->comments->count() }})</h3>
                @if ($latestComment)
                    <div class="comment">
                    @if ($latestComment->user)
                        @if ($latestComment->user->profile)
                            <div class="comment-user">
                                <img src="{{ $latestComment->user->profile->profile_image }}" class="user-icon"> <strong>{{ $latestComment->user->name }}</strong>
                            </div>
                            <p>{{ $latestComment->content }}</p>
                        @else
                            <div class="comment-user">
                                <div class="nonuser-icon"></div>
                            </div>
                            <p>{{ $latestComment->content }}</p>
                        @endif
                    @else
                        <div class="comment-user">
                            <div class="nonuser-icon"></div>
                        </div>
                        <p>{{ $latestComment->content }}</p>
                    @endif
                    </div>
                @else
                    <p>まだコメントはありません。</p>
                @endif

                <form action="{{ url('comment/' . $product->id) }}" method="post" class="comment-form">
                    @csrf
                    <h4>商品へのコメント</h4>
                    <textarea name="content" cols="100" rows="3"></textarea>
                    <button class="comment-button">コメントを送信する</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
