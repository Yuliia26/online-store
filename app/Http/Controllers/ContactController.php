<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\ContactFormRequest;
use App\Notifications\InboxMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function mailToAdmin(ContactFormRequest $message, Admin $admin)
    {
        $admin->notify(new InboxMessage($message));
        session()->flash('success', 'Сообщение отправлено!');
        // redirect the user back
        return redirect()->route('index');
    }
}
