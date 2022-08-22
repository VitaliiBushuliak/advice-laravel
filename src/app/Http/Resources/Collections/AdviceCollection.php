<?php

declare(strict_types=1);

namespace App\Http\Resources\Collections;

use App\Http\Resources\AdviceResource;
use App\Models\Advice;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @mixin LengthAwarePaginator
 */
class AdviceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        $this->getCollection()->transform(function (Advice $advice) {
            return new AdviceResource($advice);
        });

        return parent::toArray($request);
    }
}
