<?php

declare(strict_types=1);

namespace App\Events\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RegisterEvent
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(
        public RegisterRequest $request,
        public User $user,
    ) {
    }
}
