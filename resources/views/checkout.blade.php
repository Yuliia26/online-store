@extends('master')

@section('title', 'Оформления заказа')

@section('content')
    <div class="order">
        <div class="container">
            <div class="order__wrap">
                <h2>Подтверждение заказа</h2>
                <div class="order__text">
                    <p>Общая стоимость заказа <span>{{$order->getTotalPrice()}} грн</span>.</p>
                    <p>Укажите имя и номер телефона, чтобы наш менеджер мог с вами связаться.</p>
                </div>
                <div class="form">
                    <form action="{{route('basket-confirm')}}" method="post">
                        @csrf
                        <div class="form__item">
                            <label for="name">Ваше имя</label>
                            <input id="name" name="name" type="text" value="{{old('name')}}">
                            @error('name')
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
                        <div class="form__item">
                            <input type="submit" value="Подтвердить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
