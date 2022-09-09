<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'date_of_birth' => $this->date_of_birth->format(config('custom.format.date')),
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at?->format(config('custom.format.datetime')),
            'password' => $this->password,
            'remember_token' => $this->remember_token,
            'created_at' => $this->created_at->format(config('custom.format.datetime')),
            'updated_at' => $this->updated_at->format(config('custom.format.datetime')),
            'deleted_at' => $this->deleted_at?->format(config('custom.format.datetime')),
        ];
    }
}
