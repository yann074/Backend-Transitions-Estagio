<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */public function rules(): array
{
    return [
        'type' => 'required|boolean',
        'value' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'description' => 'required'
    ];
}

public function messages(): array
{
    return [
        'type.required' => 'O campo "tipo" é obrigatório.',
        'type.boolean' => 'O campo "tipo" deve ser verdadeiro ou falso.',
        
        'value.required' => 'O campo "valor" é obrigatório.',
        'value.numeric' => 'O campo "valor" deve ser um número.',
        
        'category_id.required' => 'O campo "categoria" é obrigatório.',
        'category_id.exists' => 'A categoria informada não existe.',
        
        'description.required' => 'O campo "descrição" é obrigatório.',
    ];
}
}
