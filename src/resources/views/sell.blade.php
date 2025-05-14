@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/sell.css')}}">
@endsection

@section('content')
<div class="sell_content">
    <h2 class="title">商品の出品</h2>
    <form action="{{ url('/sell') }}" class="sell__input-form" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="image-upload__form">
            <div class="image-upload">
                <h4>商品画像</h4>
                <label for="image-upload">画像を選択する</label>
                <input type="file" id="image-upload" name="image">
            </div>
            <div id="image-preview-container" style="display: none;">
                <img id="image-preview" src="#" alt="選択された画像" style="max-width: 200px; max-height: 200px;">
            </div>
            <div class="form__error">
                @error('image')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="product-details">
            <h3>商品の詳細</h3>

            <div class="category">
                <h4>カテゴリー</h4>
                <div class="category-options">
                @foreach ($categories as $category)
                    <input type="checkbox" id="category_{{$category->id}}" value="{{$category->id}}" name="category[]">
                    <label for="category_{{$category->id}}">{{$category->name}}</label>
                @endforeach
            </div>
            <div class="form__error">
                @error('category')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="condition">
            <h4>商品の状態</h4>
            <div class="condition-options">
                @php
                $conditions = ['良好', '目立った傷や汚れなし', 'やや傷や汚れあり', '状態が悪い'];
                @endphp
                <select id="condition" name="condition" required>
                    <option value="">選択してください</option>
                    @foreach($conditions as $key => $condition)
                        <option value="{{ $condition }}">{{ $condition }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form__error">
                @error('condition')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="name-description">
            <h4>商品名と説明</h4>
            <div class="input-form__group">
                <p>商品名</p>
                <input type="text" name="name" class="input-form__item" value="{{ old('name') }}">
            </div>
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div class="input-form__group">
                <p>ブランド名</p>
                <input type="text" name="brand" class="input-form__item" value="{{ old('brand') }}">
            </div>
            <div class="form__error">
                @error('brand')
                {{ $message }}
                @enderror
            </div>
            <div class="input-form__group">
                <p>商品の説明</p>
                <textarea name="description" class="input-form__item">{{ old('description') }}</textarea>
            </div>
            <div class="form__error">
                @error('description')
                {{ $message }}
                @enderror
            </div>
            <div class="input-form__group">
                <p>販売価格</p>
                <input type="text" name="price" class="input-form__item" value="{{ old('price') }}">
            </div>
            <div class="form__error">
                @error('price')
                {{ $message }}
                @enderror
            </div>
        </div>
        <button class="sell-button">出品する</button>
    </form>
</div>
<script>
    const imageUpload = document.getElementById('image-upload');
    const imagePreviewContainer = document.getElementById('image-preview-container');
    const imagePreview = document.getElementById('image-preview');

    imageUpload.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreviewContainer.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '#';
            imagePreviewContainer.style.display = 'none';
        }
    });
</script>
@endsection
