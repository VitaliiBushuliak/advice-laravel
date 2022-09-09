<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Events\Auth\RegisterEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\RegisterResource;
use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(RegisterRequest $request): RegisterResource
    {
        $user = $this->create($request->validated());
        $token = $this->createToken($user, $request);

        RegisterEvent::dispatch($request, $user);

        auth()->guard()->login($user);

        return new RegisterResource($request, $user, $token);
    }

    protected function create(array $data): User
    {
        return User::create(
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'date_of_birth' => $data['date_of_birth'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]
        );
    }

    protected function createToken(User $user, RegisterRequest $request): Token
    {
        return $user->tokens()->create(
            [
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'token' => hash('sha256', Str::random(40)),
            ]
        );
    }
}
