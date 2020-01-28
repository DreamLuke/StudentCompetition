<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\onAddPaperEvent' => [
			'App\Listeners\AddPaperListener',
        ],
        'App\Events\onAddValueEvent' => [
            'App\Listeners\AddValueListener',
        ],
        'App\Events\onAddCommentEvent' => [
            'App\Listeners\AddCommentListener',
        ],
        'App\Events\onAddPopularEvent' => [
            'App\Listeners\AddPopularListener',
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
