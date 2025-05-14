<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COACHTECHフリマ</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/login_register.css')}}">
    @yield('css')

</head>
<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo"><img src="{{ asset('images/log/logo.svg') }}" alt="coachtechフリマのロゴ"></h1>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>