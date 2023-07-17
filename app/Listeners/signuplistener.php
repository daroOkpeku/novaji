<?php

namespace App\Listeners;

use App\Events\signevnt;
use App\Mail\register;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class signuplistener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(signevnt $event)
    {
        $data = [
            'name'=>$event->name,
            'email'=>$event->email,
        ];

        Mail::to($event->email)->send(new register($data));
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
