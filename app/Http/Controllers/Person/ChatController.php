<?php

namespace App\Http\Controllers\Person;

use App\Chat;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChatRequest;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index() {
        $user_id = Auth::user()->id;
        $chat = Chat::where('user_id', $user_id)->first();
        return view('person.chat', ['chat' => $chat]);
    }

    public function send(ChatRequest $request) {
        $user_id = Auth::user()->id;
        $chat = Chat::where('user_id', $user_id)->first();
        if (is_null($chat)) {
            $chat = Chat::create(array('user_id' => $user_id));
        }
        $message = $request->all();
        Message::create(array('chat_id' => $chat->id, 'sender_id' => $user_id, 'message' => $message['message']));
        return redirect()->route('messages');
    }
}
