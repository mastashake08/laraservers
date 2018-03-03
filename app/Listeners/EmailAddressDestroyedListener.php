<?php

namespace App\Listeners;

use App\Events\EmailAddressDestroyed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailAddressDestroyedListener
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
     * @param  EmailAddressDestroyed  $event
     * @return void
     */
    public function handle(EmailAddressDestroyed $event)
    {
        //
    }
}
