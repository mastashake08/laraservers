<?php

namespace App\Listeners;

use App\Events\KeyCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class KeyCreatedListener
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
     * @param  KeyCreated  $event
     * @return void
     */
    public function handle(KeyCreated $event)
    {
        //
    }
}
