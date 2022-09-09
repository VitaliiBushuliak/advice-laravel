<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\Auth\RegisterEvent;
use App\Listeners\Auth\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        RegisterEvent::class => [
            SendEmailVerificationNotification::class,
        ],
    ];
}
