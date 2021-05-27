<?php

namespace App\Listeners;

use App\Events\TestEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTestMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(TestEvent $event)
    {
        Mail::send('emails.welcome', ['text' => $event->text], function ($message) use ($event) {
            $message->to($event->mail);
            $message->subject('Witaj u nas!');
        });
    }
}
