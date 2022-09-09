<?php

declare(strict_types=1);

namespace App\Listeners\Auth;

use App\Events\Auth\RegisterEvent;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class SendEmailVerificationNotification
{
    public function handle(RegisterEvent $event): void
    {
        if ($event->user instanceof MustVerifyEmail && !$event->user->hasVerifiedEmail()) {
            $event->user->sendEmailVerificationNotification();
        }
    }
}
