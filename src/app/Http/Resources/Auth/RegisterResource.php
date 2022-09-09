<?php

namespace App\Http\Resources\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    public function __construct(
        private readonly RegisterRequest $request,
        private readonly User $user,
        private readonly Token $token,
    ) {
        parent::__construct($this->request);
    }

    public function toArray($request): array
    {
        return [
            'ip' => $request->ip(),
            'user' => new UserResource($this->user),
            'user_agent' => $request->userAgent(),
            'token' => $this->token->toArray(),
        ];
    }
}
