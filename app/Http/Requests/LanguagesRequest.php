<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguagesRequest extends FormRequest
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
            'languages.*.name'          => 'required|unique:languages',
            'languages.*.local'         => 'required',
            'languages.*.native'        => 'required',

        ];
    }
    public function messages(): array
    {
        return [
            'languages.*.name.required'     => "The :attribute is Require",
            'languages.*.name.unique'       => "The :attribute is Existing",
            'languages.*.local.required'    => "The :attribute is Require",
            'languages.*.native.required'   => "The :attribute is Require",
        ];
    }
    public function attributes():array{
        return [

                'languages.*.name' => 'the field Name in Row :position is Exist in database ',
        ];
    }
}
