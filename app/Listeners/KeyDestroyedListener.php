<?php

namespace App\Listeners;

use App\Events\KeyDestroyed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class KeyDestroyedListener
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
     * @param  KeyDestroyed  $event
     * @return void
     */
    public function handle(KeyDestroyed $event)
    {
        //
    }
}
