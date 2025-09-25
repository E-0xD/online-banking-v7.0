<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrantApplicationControllerCompanySubmitRequest extends FormRequest
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
            'name'                 => ['required', 'string', 'max:255'],
            'tax_id'               => ['required', 'string', 'regex:/^\d{2}-\d{7}$/', 'unique:grant_applications,tax_id'],
            // 'tax_id'               => ['required', 'string', 'unique:grant_applications,tax_id'],
            'organization_type'    => ['required', 'string', 'max:255'],
            'founding_year'        => ['required', 'date_format:Y', 'before_or_equal:' . now()->year],
            'full_mailing_address' => ['required', 'string', 'max:1000'],
            'contact_phone'        => ['required', 'string'],
            // 'contact_phone'        => ['required', 'string', 'regex:/^\(\d{3}\) \d{3}-\d{4}$/'],
            'contact_person'       => ['required', 'string', 'max:255'],
            'mission_statement'    => ['required', 'string', 'max:2000'],
            'date_of_incorporation' => ['required', 'date', 'before_or_equal:today'],
            'project_title'        => ['required', 'string', 'max:255'],
            'project_description'  => ['required', 'string', 'min:50'],
            'expected_outcome'     => ['required', 'string', 'min:30'],
            'amount'               => ['required', 'numeric', 'min:1000'], // example min
        ];
    }

    public function messages()
    {
        return [
            'tax_id.regex'          => 'The Tax ID must follow the format: XX-XXXXXXX.',
            // 'contact_phone.regex'   => 'The contact phone must be in the format: (xxx) xxx-xxxx.',
            'founding_year.before_or_equal' => 'Founding year cannot be in the future.',
        ];
    }
}
