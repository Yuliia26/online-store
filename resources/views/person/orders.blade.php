@extends('master')

@section('title', 'Мои заказы')

@section('content')
    <div class="admin">
        <div class="container">
            <h3>Мои заказы</h3>
            <div class="admin__wrap">
                @php
                    $flag = 0;
                @endphp
                @foreach($orders as $index=>$order)
                    @if($order->products->count()>0)
                        @php
                            $flag = 1;
                        @endphp
                    @endif
                @endforeach

                @if($flag)
                <div class="admin__responsive">
                    <table>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Картинка</th>
                            <th>Описание</th>
                            <th>Цена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $cnt=0;
                        @endphp
                        @foreach($orders as $index=>$order)
                            @foreach($order->products as $product)

                                <tr>
                                    <td>
                                        @php
                                            $cnt++;
                                            echo $cnt;
                                        @endphp
                                    </td>
                                    <td><p>{{ $product->name }}</p></td>
                                    <td><img src="{{ Storage::url($product->img) }}"></td>
                                    <td><p>{{ $product->description }}</p></td>
                                    <td><p>{{$product->price}} грн</p></td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <p>Список заказов пустой.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
