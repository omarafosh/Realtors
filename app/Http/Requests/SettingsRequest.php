<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'lang_name'      => 'required|unique:settings',
            'lang_local'     => 'required',
            'lang_native'    => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'lang_name.required'     => "The :attribute is require",
            'lang_name.unique'       => "The :attribute is existing",
            'lang_local.required'    => "The loacl is require",
            'lang_native.required'   => "The native is require",
        ];
    }
}
