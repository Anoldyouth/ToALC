<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SyntaxAnalyzerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'grammar_path' => ['required', 'string'],
            'file_path' => ['required', 'string'],
            'debug' => ['boolean'],
        ];
    }

    public function getGrammarPath(): string
    {
        return $this->get('grammar_path');
    }

    public function getFilePath(): string
    {
        return $this->get('file_path');
    }

    public function isDebug(): bool
    {
        return $this->get("debug", false);
    }

    public function messages(): array
    {
        return [
            'grammar_path.required' => 'Требуется путь до грамматики',
            'grammar_path.string' => 'путь должен быть строкой',
            'file_path.required' => 'Требуется путь до файла',
            'file_path.string' => 'Путь должен быть строкой',
        ];
    }
}
