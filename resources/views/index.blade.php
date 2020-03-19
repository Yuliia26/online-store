@extends('master')

@section('title', 'Главная')

@section('content')
    @if(session()->has('success'))
        <div class="message">
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif
    <div class="products">
        <div class="container">
            <h1>Каталог</h1>
            <div class="products__wrap">
                @foreach($products as $product)
                    <div class="products__item">
                        <a href="#" class="products__img">
                            <img src="{{Storage::url($product->img)}}" alt="#">
                        </a>
                        <div class="products__name">
                            <h2><a href="#">{{$product->name}}</a></h2>
                        </div>
                        <div class="products__price">
                            <span>{{$product->price}} грн</span>
                        </div>
                        <div class="products__cart">
                            <form action="{{route('basket-add', $product->id)}}" method="post">
                                @csrf
                                <button type="submit">В корзину</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="feedback" id="feedback">
        <div class="container">
            <h1>Форма обратной связи</h1>
            <div class="form">
                <form action="{{route('contact')}}" method="post">
                    @csrf
                    <div class="form__item_horizontal">
                        <div class="form__item">
                            <label for="email">Ваш email</label>
                            <input id="email" name="email" type="email" value="{{old('email')}}">
                            @error('email')
                            <label class="error">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form__item">
                            <label for="phone">Ваш номер телефона</label>
                            <input id="phone" name="phone" type="text" value="{{old('phone')}}">
                            @error('phone')
                            <label class="error">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="form__item">
                        <label for="message">Сообщение</label>
                        <textarea id="message" name="message" rows="5">{{old('message')}}</textarea>
                        @error('message')
                        <label class="error">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form__item">
                        {!! Captcha::display($attributes = [
                            'data-theme' => 'white',
                            'data-type' => 'audio',
                        ]) !!}
                        @error('g-recaptcha-response')
                        <label class="error">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form__item">
                        <input type="submit" value="Отправить">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
