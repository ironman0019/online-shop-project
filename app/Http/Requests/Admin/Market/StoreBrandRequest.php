<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'persian_name' => 'required|max:120|min:2|regex:/^[ا-ی\-۰-۹ء-ي., ]+$/u',
            'english_name' => 'required|max:120|min:2|regex:/^[a-zA-Z0-9\., ]+$/u',
            'logo' => 'required|image|mimes:png,jpg,jpeg,gif'
        ];
    }
}