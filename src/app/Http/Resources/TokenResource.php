<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Token;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Token
 */
class TokenResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'ip_address' => $this->ip_address,
            'user_agent' => $this->user_agent,
            'token' => $this->token,
            'last_used_at' => $this->last_used_at?->format(config('custom.format.datetime')),
            'expires_at' => $this->expires_at?->format(config('custom.format.datetime')),
            'created_at' => $this->created_at->format(config('custom.format.datetime')),
            'updated_at' => $this->updated_at->format(config('custom.format.datetime')),
            'deleted_at' => $this->deleted_at?->format(config('custom.format.datetime')),
        ];
    }
}
