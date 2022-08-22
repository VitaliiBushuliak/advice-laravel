<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Advice;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Advice
 */
class AdviceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'text' => $this->getTranslations('text'),
            'audio' => $this->sound,
            'created_at' => $this->created_at->format(config('custom.format.datetime')),
            'updated_at' => $this->updated_at->format(config('custom.format.datetime')),
        ];
    }
}
