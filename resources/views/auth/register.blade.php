@extends('master')

@section('title', 'Регистрация')

@section('content')
    <div class="login">
        <div class="container">
            <div class="login__wrap">
                <h3>Регистрация</h3>
                <div class="form">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form__item">
                            <label for="name">Ваше имя</label>
                            <input id="name" name="name" type="text" value="{{old('name')}}">
                            @error('name')
                            <label class="error">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form__item">
                            <label for="email">Ваш email</label>
                            <input id="email" name="email" type="email" value="{{old('email')}}">
                            @error('email')
                            <label class="error">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form__item">
                            <label for="password">Пароль</label>
                            <input id="password" name="password" type="password" value="{{old('password')}}">
                            @error('password')
                            <label class="error">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form__item">
                            <label for="password">Подтверждение пароля</label>
                            <input id="password" name="password_confirmation" type="password" value="{{old('password_confirmation')}}">
                            @error('password_confirmation')
                            <label class="error">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form__item">
                            <input type="submit" value="Зарегистрироваться">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
