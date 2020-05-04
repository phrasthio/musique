<?php

namespace App\Listeners\Auth;

use App\Events\Auth\UserActivationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\Auth\ActivationEmail;

class SendActivationEmail
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
     * @param  UserActivationEmail  $event
     * @return void
     */
    public function handle(UserActivationEmail $event)
    {
        if($event->user->active){
            return;
        }

        Mail::to($event->user->email)->send(new ActivationEmail($event->user));
    }
}
