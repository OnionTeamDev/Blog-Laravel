<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ContactEmail implements ShouldQueue
{
    public function handle($event)
    {
        Mail::send('contactMail', $event->data, function ($message) use ($event) {
            $message->from('minho.technology@gmail.com', 'OnionTeam');
            $message->to($event->mail);
            $message->cc('minhho.technology@gmail.com', 'Minh Hồ');
            $message->subject('Cảm ơn bạn đã đăng kí nhân thư thông báo từ chúng tôi');
        });
    }
}
