<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|required|max:30',
            'slug' => 'string|required|max:30',
            'category' => 'string|required|max:30',
            'why' => 'string|required|max:30',
            'identity' => 'string|required|unique:products|max:30'
        ];
    }
}
