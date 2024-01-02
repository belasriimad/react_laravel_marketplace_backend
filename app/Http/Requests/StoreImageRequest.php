<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
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
            //
            'title' => 'required|max:255',
            'price' => 'required|integer',
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'The category field is required.',
            'category_id.integer' => 'The category field must be an integer.'
        ];
    }
}
