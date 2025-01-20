<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'description' => 'required|max:1000|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'tags' => 'required|max:200|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'weight' => 'numeric|nullable',
            'length' => 'numeric|nullable',
            'width' => 'numeric|nullable',
            'height' => 'numeric|nullable',
            'price' => 'required|numeric|min:2',
            'marketable_number' => 'required|numeric',
            'status' => 'required|in:0,1',
            'marketable' => 'required|in:0,1',
            'brand_id' => 'required|numeric|exists:brands,id',
            'product_category_id' => 'required|numeric|exists:product_categories,id',
            'image' => 'image|mimes:png,jpg,jpeg,gif'
        ];
    }
}
