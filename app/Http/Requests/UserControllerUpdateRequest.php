<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\AgeAbove18;
use Illuminate\Foundation\Http\FormRequest;

class UserControllerUpdateRequest extends FormRequest
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
        $uuid = $this->route('user');
        $user = User::where('uuid', $uuid)->first();

        return [
            'name'                  => 'nullable|string|max:255',
            'middle_name'           => 'nullable|string|max:255',
            'last_name'             => 'nullable|string|max:255',
            'username'              => 'nullable|string|max:50|unique:users,username,' . $user->id,

            'email'                 => 'required|email|unique:users,email,' . $user->id,
            // 'email'                 => 'required|email:rfc,dns|unique:users,email,' . $user->id,
            'phone'                 => 'nullable|string|max:20',

            'country'               => 'nullable|string',
            'address'               => 'nullable|string|max:255',
            'city'                  => 'nullable|string|max:100',
            'state'                 => 'nullable|string|max:100',
            'zip_code'              => 'nullable|string|max:20',

            'title'                 => 'nullable',
            'dob'                   => ['required', 'date', 'before:today', 'after:1900-01-01', new AgeAbove18],
            'gender'                => 'nullable',
            'marital_status'        => 'nullable',
            'employment'            => 'nullable',

            'currency'              => 'nullable|string|max:50',
            'account_type'          => 'nullable',
            'account_limit'         => 'required|numeric|min:0',

            'should_transfer_fail'  => 'required',
            'should_local_transfer_use_transfer_code'  => 'required',

            'security_number'       => 'nullable|string|max:50|unique:users,security_number,' . $user->id,
            'salary_range'          => 'nullable',

            'next_of_kin_name'      => 'nullable|string|max:255',
            'next_of_kin_address'   => 'nullable|string|max:255',
            'next_of_kin_relationship' => 'nullable|string|max:100',
            'next_of_kin_age'       => 'nullable|integer|min:18|max:120',
            'next_of_kin_phone'     => 'nullable|string|max:20',
            'next_of_kin_email'     => 'nullable|email',
            // 'next_of_kin_email'     => 'nullable|email:rfc,dns',

            'image'                 => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password'              => 'nullable|string|min:8|',
        ];
    }
}
