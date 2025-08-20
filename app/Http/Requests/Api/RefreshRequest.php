<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RefreshRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'refresh_token' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'refresh_token.required' => 'El refresh token es obligatorio.',
            'refresh_token.string'   => 'El refresh token debe ser un texto válido.',
        ];
    }

    public function attributes(): array
    {
        return [
            'refresh_token' => 'token de actualización',
        ];
    }
}
