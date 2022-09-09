<?php

declare(strict_types=1);

use App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [Api\Auth\RegisterController::class, 'register']);

Route::apiResource('/advices', Api\AdviceController::class);
Route::get('/advices/{id}/exists', [Api\AdviceController::class, 'exists']);
