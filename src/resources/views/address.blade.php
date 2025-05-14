@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/address.css')}}">
@endsection

@section('content')
<div class="address-edit__content">
    <div class="edit-form__heading">
        <h2 class="edit-form__heading-subtitle">住所の変更</h2>
    </div>
    <form class="edit-form" action="/address" method="post" novalidate>
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">郵便番号</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="number" name="postal_code" value="{{ old('postal_code') }}">
                </div>
                <div class="form__error">
                @error('postal_code')
                    {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" value="{{ old('address') }}">
                </div>
                <div class="form__error">
                @error('address')
                    {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" value="{{ old('building') }}">
                </div>
                <div class="form__error">
                @error('building')
                    {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">更新する</button>
        </div>
    </form>
</div>
@endsection