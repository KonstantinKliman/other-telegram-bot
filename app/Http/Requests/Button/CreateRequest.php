<?php

namespace App\Http\Requests\Button;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'text' => ['required', 'string'],
            'nextMessageId' => ['required', 'numeric', Rule::exists('messages', 'id')],
        ];
    }
}
