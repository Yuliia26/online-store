@extends('master')

@isset($product)
    @section('title', 'Редактировать товар')
@else
    @section('title', 'Добавить товар')
@endisset

@section('content')
    <div class="admin">
        <div class="container">
            <h3>@yield('title')</h3>
            <div class="admin__wrap">
                <form
                    @isset($product)
                    action="{{ route('products.update', $product->id) }}"
                    @else
                    action="{{ route('products.store') }}"
                    @endisset
                    enctype="multipart/form-data" method="post">
                    @isset($product)
                        @method('PUT')
                    @endisset
                    @csrf
                    <div class="form__item">
                        <label for="name">Название товара</label>
                        <input id="name" name="name" type="text" value="@isset($product){{$product->name}}@else{{old('name')}}@endisset">
                        @error('name')
                        <label class="error">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form__item">
                        <label for="img">Картинка</label>
                        <input type="file" id="img" name="img">
                        @error('img')
                        <label class="error">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form__item">
                        <label for="description">Описание</label>
                        <textarea id="description" name="description">@isset($product){{$product->description}}@else{{old('description')}}@endisset</textarea>
                        @error('description')
                        <label class="error">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form__item">
                        <label for="price">Цена</label>
                        <input id="price" name="price" type="text" value="@isset($product){{$product->price}}@else{{old('price')}} @endisset">
                        @error('price')
                        <label class="error">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form__item">
                        <input type="submit" value="Сохранить">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
