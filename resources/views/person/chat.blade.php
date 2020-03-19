@extends('master')

@section('title', 'Личные сообщения')

@section('content')
    <div class="chat">
        <div class="container">
            <h3>Личные сообщения</h3>
            <div class="chat__wrap">

                <div class="chat__messages">
                    @if(isset($chat) && $chat->messages->count()>0)
                        @foreach($chat->messages as $message)
                        <div class="chat__item @if($message->sender_id == 1) chat__item_light @endif">
                            <div class="chat__title">
                                <p>@if($message->sender_id == 1) Администратор @else Вы @endif</p>
                                <span>{{$message->created_at}}</span>
                            </div>
                            <div class="chat__text">
                                <p>{{$message->message}}</p>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p>Список сообщений пустой.</p>
                    @endif
                </div>
                <div class="chat__form">
                    <form action="{{route('message-send')}}" method="post">
                        @csrf
                        <div class="form__item">
                            <label>Написать в техподдержку</label>
                            <textarea rows="5" name="message">{{old('message')}}</textarea>
                            @error('message')
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
    </div>
@endsection
