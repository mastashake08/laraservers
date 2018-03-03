<?php

namespace App\Listeners;

use App\Events\DomainDestroyed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DomainDestroyedListener
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
     * @param  DomainDestroyed  $event
     * @return void
     */
    public function handle(DomainDestroyed $event)
    {
        //
    }
}
