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
            'lang_name'      => 'required|unique:settings',
        ];
    }
    public function messages(): array
    {
        return [
            'lang_name.required'     => "The Name is require",
            'lang_name.unique'       => "The Name is existing",
        ];
    }
}
