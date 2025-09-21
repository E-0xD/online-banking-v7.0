<?php

namespace App\Http\Requests;

use App\Rules\AgeAbove18;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class KycControllerStoreRequest extends FormRequest
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
            'name'                     => 'required|string|max:50',
            'middle_name'              => 'nullable|string|max:50',
            'last_name'                => 'required|string|max:50',
            'email'                    => 'required|email:rfc,dns|max:100|unique:users,email,' . Auth::id(),
            'phone'                    => 'required|string|max:20|regex:/^\+?[0-9]{7,15}$/',
            'title'                    => 'required',
            'gender'                   => 'required|in:Male,Female,Other',
            'zip_code'                 => 'nullable|string|max:10',
            'dob'                      => ['required', 'date', 'before:today', 'after:1900-01-01', new AgeAbove18],
            'security_number'          => 'required|string|max:30|unique:users,security_number,' . Auth::id(),
            'account_type'             => 'required',
            'employment'               => 'required',
            'salary_range'             => 'required',
            'address'                  => 'required|string|max:255',
            'city'                     => 'required|string|max:100',
            'state'                    => 'required|string|max:100',
            'country'                  => 'required|string|max:100',

            'next_of_kin_name'         => 'required|string|max:100',
            'next_of_kin_address'      => 'required|string|max:255',
            'next_of_kin_relationship' => 'required|string|max:50',
            'next_of_kin_age'          => 'required|integer|min:18|max:120',
            'next_of_kin_phone'        => 'required|string|max:20|regex:/^\+?[0-9]{7,15}$/',
            'next_of_kin_email'        => 'nullable|email:rfc,dns|max:100',

            'document_type'            => 'required',
            'front_side'               => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'back_side'                => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ];
    }
}
