<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Token;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class TokenProvider extends ServiceProvider
{
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(Token::class);
    }
}
