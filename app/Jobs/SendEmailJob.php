<?php

namespace App\Jobs;

use App\Mail\ThanksContact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    public $mail;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $mail)
    {
        $this->data = $data;
        $this->mail = $mail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Mail::send('contactMail', $this->data, function ($message) use ($event) {
        //     $message->from('minho.technology@gmail.com', 'OnionTeam');
        //     $message->to($this->mail);
        //     $message->cc('minhho.technology@gmail.com', 'Minh Hồ');
        //     $message->subject('Cảm ơn bạn đã đăng kí nhân thư thông báo từ chúng tôi');
        // });
        Mail::to($this->mail)
        ->send(new ThanksContact());
    }
}
