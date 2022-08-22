<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Advice\CreateAdviceRequest;
use App\Http\Requests\Advice\UpdateAdviceRequest;
use App\Http\Resources\Collections\AdviceCollection;
use App\Http\Resources\AdviceResource;
use App\Models\Advice;
use Illuminate\Http\JsonResponse;

class AdviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'store', 'show', 'update', 'destroy', 'exists']]);
    }

    public function index(): AdviceCollection
    {
        $advices = Advice::query()->paginate();

        return new AdviceCollection($advices);
    }

    public function store(CreateAdviceRequest $request): AdviceResource
    {
        $advice = Advice::query()->create($request->validated());

        return new AdviceResource($advice);
    }

    public function show(Advice $advice): AdviceResource
    {
        return new AdviceResource($advice);
    }

    public function update(UpdateAdviceRequest $request, Advice $advice): AdviceResource
    {
        $advice->update($request->validated());

        return new AdviceResource($advice);
    }

    public function destroy(Advice $advice): AdviceResource
    {
        $advice->delete();

        return new AdviceResource($advice);
    }

    public function exists(int $id): JsonResponse
    {
        $exists = Advice::query()->where('id', $id)->exists();

        return response()->json($exists);
    }
}
