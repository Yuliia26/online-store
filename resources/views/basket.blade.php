@extends('master')

@section('title', 'Корзина')

@section('content')
    <div class="basket">
        <div class="container">
            <h1>Корзина</h1>
            <div class="basket__wrap">
                @if(isset($order) && $order->products->count()>0)
                    @foreach($order->products as $product)
                        <div class="basket__item">
                            <div class="basket__image">
                                <a class="image-popup-zoom" href="{{Storage::url($product->img)}}">
                                    <img src="{{Storage::url($product->img)}}" alt="" />
                                </a>
                            </div>
                            <div class="basket__name">
                                <h2>{{$product->name}}</h2>
                                <p>{{$product->description}}</p>
                            </div>
                            <div class="basket__price">
                                <span>Цена</span>
                                <p>{{$product->price}} грн</p>
                            </div>
                            <div class="basket__delete">
                                <form action="{{route('basket-remove', $product->id)}}" method="post">
                                    @csrf
                                    <button type="submit"></button>
                                </form>

                            </div>
                        </div>
                    @endforeach
                    <div class="basket__footer">
                        <p>Итого {{$order->getTotalPrice()}} грн</p>
                        <a href="{{route('checkout')}}" >Оплатить</a>
                    </div>
                @else
                    <div class="basket__empty">
                        <p>Вы еще ничего не добавили в корзину.</p>
                    </div>
                @endisset
            </div>
        </div>
    </div>
@endsection
