<?php

declare(strict_types=1);

namespace App\Http\Requests\Advice;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdviceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'text' => [
                'nullable',
                'array',
            ],
            'text.en' => [
                'nullable',
                'string',
                'max:255',
            ],
            'text.ru' => [
                'nullable',
                'string',
                'max:255',
            ],
            'sound' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }
}
