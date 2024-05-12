<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\TooManyLoginAttemptsNotification;

class LockoutListener
{
    /**
     * Handle the event.
     *
     * @param  Lockout  $event
     * @return void
     */
    public function handle(Lockout $event)
    {
        $user = $event->request->user();
        if ($user) {
            $user->locked = true;
            $user->save();
            $user->notify(new TooManyLoginAttemptsNotification());
        }
    }
}
