<?php

namespace App\Http\Requests\Button;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'text' => ['required', 'string'],
        ];
    }
}
