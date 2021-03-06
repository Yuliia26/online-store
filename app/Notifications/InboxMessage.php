<?php

namespace App\Notifications;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InboxMessage extends Notification
{
    use Queueable;
    protected $request;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ContactFormRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Новое сообщение с сайта http://testonlinestore.pp.ua/!")
            ->greeting(" ")
            ->salutation(" ")
            ->from($this->request->email, 'no-reply')
            ->line('Номер телефона: ' . $this->request->phone)
            ->line('E-mail: ' . $this->request->email)
            ->line('Сообщение: ')
            ->line($this->request->message);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
