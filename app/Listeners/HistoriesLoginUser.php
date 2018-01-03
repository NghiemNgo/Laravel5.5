<?php

namespace App\Listeners;

use App\Events\UserLogin;

class HistoriesLoginUser
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
     * @param  UserLogin  $event
     * @return void
     */
    public function handle(UserLogin $event)
    {
        $event->user->log_histories = date('m/d/Y h:i:s a', time()).PHP_EOL.$event->user->log_histories;
        $event->user->save();
    }
}
