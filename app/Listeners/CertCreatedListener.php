<?php

namespace App\Listeners;

use App\Events\CertCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CertCreatedListener
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
     * @param  CertCreated  $event
     * @return void
     */
    public function handle(CertCreated $event)
    {
        //
    }
}
