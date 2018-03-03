<?php

namespace App\Listeners;

use App\Events\DomainCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DomainCreatedListener
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
     * @param  DomainCreated  $event
     * @return void
     */
    public function handle(DomainCreated $event)
    {
        //
    }
}
