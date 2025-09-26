<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IRSTaxRefundControllerStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],

            'social_security_number' => [
                'required',
                'string',
                'regex:/^\d{3}-\d{2}-\d{4}$/', // format: 123-45-6789
            ],

            'id_me_email' => ['required', 'email:rfc,dns', 'max:255'],

            'id_me_password' => ['required', 'string', 'min:8', 'max:50'],

            'country' => ['required', 'string'],
        ];
    }

    public function message()
    {
        return [
            'social_security_number.regex' => 'Social Security Number must be in the format: 123-45-6789',
        ];
    }
}
