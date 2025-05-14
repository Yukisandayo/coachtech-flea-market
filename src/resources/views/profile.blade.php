@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@section('content')
    <div class="profile__content">
        <div class="profile-form__heading">
            <h2 class="heading__subtitle">プロフィール設定</h2>
        </div>
        <div class="profile-input__form">
            <form class="profile-form" action="{{ isset($user) ? '/mypage/profile' : '/initial/mypage/profile' }}" method="post" enctype="multipart/form-data" novalidate>
                @csrf
                @if(isset($user))
                    @method('PUT')
                @endif
                <div class="profile-image__container">
                @if (isset($user) && $user->profile && $user->profile->profile_image)
                    <img src="{{ asset('storage/images/' . $user->profile->profile_image) }}" alt="プロフィール画像" class="profile-image">
                @endif
                    <output id="list" class="image_output"></output>
                    <input type="file" id="profile_image" class="image" name="profile_image">
                    <div class="form__error">
                        @error('profile_image')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="profile-detail__container">
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">ユーザー名</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="text" name="name" value="{{ old('name', isset($user) ? $user->name : '') }}">
                            </div>
                            <div class="form__error">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">郵便番号</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="number" name="postal_code" value="{{ old('postal_code', isset($user->profile) ? $user->profile->postal_code : '') }}">
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
                                <input type="text" name="address" value="{{ old('address', isset($user->address) ? $user->profile->address : '') }}">
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
                                <input type="text" name="building" value="{{ old('building', isset($user->building) ? $user->profile->building : '') }}">
                            </div>
                            <div class="form__error">
                                @error('building')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">更新する</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const profileImageInput = document.getElementById('profile_image');

        if (profileImageInput) {
        profileImageInput.onchange = function(event){
            initializeFiles();

            var files = event.target.files;

            if (files.length > 0) {
                var reader = new FileReader;
                reader.readAsDataURL(files[0]);

                reader.onload = function (e) {
                    var div = document.createElement('div');
                    div.className = 'reader_file';
                    div.innerHTML += '<img class="reader_image" src="' + e.target.result + '" style="max-width: 200px; max-height: 200px;">';
                    document.getElementById('list').insertBefore(div, null);
                    };
                }
            };
        }

        function initializeFiles() {
            document.getElementById('list').innerHTML = '';
        }
    </script>
@endsection