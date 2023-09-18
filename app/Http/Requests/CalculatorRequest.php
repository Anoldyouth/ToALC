<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculatorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'expression' => ['required', 'string'],
        ];
    }

    public function getExpression(): string
    {
        return $this->get('expression');
    }

    public function messages(): array
    {
        return [
            'expression.required' => 'Требуется выражение',
            'expression.string' => 'Выражение должно быть строкой',
        ];
    }
}
