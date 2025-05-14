<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COACHTECHフリマ</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')

    @livewireStyles
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo"><img src="{{ asset('images/log/logo.svg') }}" alt="coachtechフリマのロゴ"></h1>
            <div class="header-search">
                <div class="header-search__form">
                    <input type="text" wire:model="search" placeholder="なにをお探しですか？">
                </div>
            </div>
            <div class="header__nav">
                <ul class="header__nav-list">
                    <li>
                        <form action="/logout" class="logout__form" method="post">
                        @csrf
                            <button class="logout__form--logout" type="submit">ログアウト</button>
                        </form>
                    </li>
                </ul>
                <ul class="header__nav-list">
                    <li>
                        <a href="/mypage" class="to--mypage">マイページ</a>
                    </li>
                </ul>
                <ul class="header__nav-list">
                    <li>
                        <a href="/sell" class="to--exhibition__page">出品</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    @livewireScripts
</body>
</html>