@extends('master')

@section('title', 'Панель администратора')

@section('content')
    <div class="admin">
        <div class="container">
            <h3>Товары</h3>
            @if(session()->has('success'))
                <div class="admin__message admin__message_success">
                    <p>{{ session()->get('success') }}</p>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="admin__message admin__message_error">
                    <p>{{ session()->get('error') }}</p>
                </div>
            @endif
            <div class="admin__wrap">
                <a href="{{ route('products.create') }}">Добавить товар</a>
                @if($products->count()>0)
                <div class="admin__responsive">
                    <table>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Картинка</th>
                            <th>Описание</th>
                            <th>Цена</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $index=>$product)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td><p>{{ $product->name }}</p></td>
                                <td><img src="{{ Storage::url($product->img) }}"></td>
                                <td><p>{{ $product->description }}</p></td>
                                <td><p>{{$product->price}} грн</p></td>
                                <td><a href="{{ route('products.edit', $product->id) }}">Редактировать</a></td>
                                <td><form action={{ route('products.destroy', $product->id) }}"" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">Удалить</button>
                                    </form></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                    @else
                    <p>В базе пока нету товаров.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
