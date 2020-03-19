<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.min.css">
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">
    <!-- Custom Browsers Color End -->
</head>
<body>
<header>
    <div class="logo">
        @guest
            <a href="/"><img src="/img/logo.png" alt="logo"></a>
        @endguest
        @auth
            @if(Auth::user()->isAdmin())
                <a href="{{route('products.index')}}"><img src="/img/logo.png" alt="logo"></a>
            @else
                <a href="/"><img src="/img/logo.png" alt="logo"></a>
            @endif
        @endauth
    </div>
    <div class="menu">
        <ul>
            @guest
                <li><a href="{{ route('basket') }}" class="{{ (Route::currentRouteName() == 'basket')? 'active' : null }}">Корзина</a></li>
                <li><a href="{{ route('login') }}" class="{{ (Route::currentRouteName() == 'login')? 'active' : null }}">Авторизация</a></li>
            @endguest
            @auth
                @if(!Auth::user()->isAdmin())
                    <li><a href="{{ route('basket') }}" class="{{ (Route::currentRouteName() == 'basket')? 'active' : null }}">Корзина</a></li>
                    <li><a href="{{route('person-order')}}" class="{{ (Route::currentRouteName() == 'person-order')? 'active' : null }}">Мои заказы</a></li>
                    <li><a href="{{route('messages')}}" class="{{ (Route::currentRouteName() == 'messages')? 'active' : null }}">Мои сообщения</a></li>
                @endif
                <li><a href="{{ route('logout') }}" class="{{ (Route::currentRouteName() == 'logout')? 'active' : null }}">Выход</a></li>
            @endauth
        </ul>
    </div>
</header>
<main>
@yield('content')
</main>
<footer>
    <p>© Интернет-магазин 2000–2020</p>
</footer>
<script src="/js/scripts.min.js"></script>
</body>
</html>
