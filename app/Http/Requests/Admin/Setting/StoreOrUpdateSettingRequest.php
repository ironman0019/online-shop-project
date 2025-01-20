<?php

namespace App\Http\Requests\Admin\Setting;

use App\Models\Setting\Setting;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateSettingRequest extends FormRequest
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

        $setting = Setting::first();

        return [
            'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'description' => 'required|max:500|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'keywords' => 'required|max:250|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'logo' => [
                $setting ? 'nullable' : 'required',
                'image',
                'mimes:png,jpg,jpeg,gif'
            ],
            'icon' => [
                $setting ? 'nullable' : 'required',
                'image',
                'mimes:png,jpg,jpeg,gif'
            ]
        ];
    }
}
