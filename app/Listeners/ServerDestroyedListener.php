<?php

namespace App\Listeners;

use App\Events\ServerDestroyed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ServerDestroyedListener
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
     * @param  ServerDestroyed  $event
     * @return void
     */
    public function handle(ServerDestroyed $event)
    {
        //
    }
}
