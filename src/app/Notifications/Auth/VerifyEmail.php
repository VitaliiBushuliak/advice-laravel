<?php

declare(strict_types=1);

namespace App\Notifications\Auth;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmail extends Notification
{
    public function via(MustVerifyEmail $user): array
    {
        return [
//            'mail',
        ];
    }

    public function toMail(MustVerifyEmail $user): MailMessage
    {
        return (new MailMessage())
            ->subject(__('Verify Email Address'))
            ->line(__('Please click the button below to verify your email address.'))
            ->action(__('Verify Email Address'), $this->verificationUrl($user))
            ->line(__('If you did not create an account, no further action is required.'));
    }

    protected function verificationUrl(MustVerifyEmail $user): string
    {
        return url()->temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(config('auth.verification.expire', 60)),
            [
                'id' => $user->getKey(),
                'hash' => sha1($user->getEmailForVerification()),
            ]
        );
    }
}
