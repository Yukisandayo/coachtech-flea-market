@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}">
@endsection

@section('content')
<div class="mypage-form__heading">
    <div class="profile-image__container">
    @if (optional($user->profile)->profile_image)
        <img src="{{ asset('storage/images/' . $user->profile->profile_image) }}" alt="プロフィール画像" class="profile-image">
    @else
        <div class="default-profile-image"></div>
    @endif
    </div>
    <div class="profile-name">
        {{ $user->name }}
    </div>
    <a href="/mypage/profile" class="to-edit--profile">プロフィールを編集</a>
</div>
<livewire:mypage-product-tabs />
@endsection