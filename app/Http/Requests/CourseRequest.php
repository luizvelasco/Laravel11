<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'price' => 'required|numeric|:max:10'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo nome do curso obrigatório!',
            'price.required' => 'Campo preço do curso obrigatório!',
            'price.max' => 'O preço só pode ter no máximo 8 números!',
            'price.numeric' => 'O preço só pode ter números!',
        ];
    }
}
