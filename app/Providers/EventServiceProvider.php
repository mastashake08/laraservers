<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ServerCreated' => [
            'App\Listeners\ServerCreatedListener',
        ],
        'App\Events\ServerDestroyed' => [
            'App\Listeners\ServerDestroyedListener',
        ],
        'App\Events\ServerCreated' => [
            'App\Listeners\ServerCreatedListener',
        ],
        'App\Events\EmailAddressCreated' => [
            'App\Listeners\EmailAddressCreatedListener',
        ],
        'App\Events\EmailAddressDestroyed' => [
            'App\Listeners\EmailAddressDestroyedListener',
        ],
        'App\Events\CertCreated' => [
            'App\Listeners\CertCreatedListener',
        ],
        'App\Events\KeyCreated' => [
            'App\Listeners\KeyCreatedListener',
        ],
        'App\Events\KeyDestroyed' => [
            'App\Listeners\KeyDestroyedListener',
        ],
        'App\Events\DomainCreated' => [
            'App\Listeners\DomainCreatedListener',
        ],
        'App\Events\DomainDestroyed' => [
            'App\Listeners\DomainDestroyedListener',
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
