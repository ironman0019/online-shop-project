<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoupanRequest extends FormRequest
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
            'code' => 'required|max:120|min:2|regex:/^[a-zA-Z0-9\., ]+$/u',
            'amount' => 'required|numeric',
            'amount_type' => 'required|in:0,1',
            'discount_ceiling' => 'required_if:amount_type,0|integer|between:1,100|nullable',
            'start_date' => 'required|numeric',
            'end_date' => 'required|numeric'
        ];
    }
}
