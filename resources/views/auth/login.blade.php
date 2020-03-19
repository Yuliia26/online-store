@extends('master')

@section('title', 'Авторизация')

@section('content')
    <div class="login">
        <div class="container">
            <div class="login__wrap">
                <h3>Авторизация</h3>
                <div class="form">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form__item">
                            <label for="email">Ваш email</label>
                            <input id="email" name="email" type="text">
                            @error('email')
                            <label class="error">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form__item">
                            <label for="password">Пароль</label>
                            <input id="password" name="password" type="password">
                            @error('password')
                            <label class="error">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form__item">
                            <p>Еще не зарегестрированы? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
                        </div>
                        <div class="form__item">
                            <input type="submit" value="Войти">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
