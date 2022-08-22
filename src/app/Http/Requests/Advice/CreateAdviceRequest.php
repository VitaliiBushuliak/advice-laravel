<?php

declare(strict_types=1);

namespace App\Http\Requests\Advice;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdviceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => [
                'required',
                'integer',
                'unique:advices,id',
            ],
            'text' => [
                'required',
                'array',
            ],
            'text.en' => [
                'required',
                'string',
                'max:255',
            ],
            'text.ru' => [
                'required',
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
