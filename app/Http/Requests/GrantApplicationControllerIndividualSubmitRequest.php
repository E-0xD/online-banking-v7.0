<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrantApplicationControllerIndividualSubmitRequest extends FormRequest
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
            'amount' => ['required', 'numeric', 'min:0'],
            'grant_categories'   => ['required', 'array', 'min:1'],
            'grant_categories.*' => ['integer', 'exists:grant_categories,id'],
        ];
    }

    public function messages()
    {
        return [
            'grant_categories.required' => 'Please select at least one grant category.',
            'grant_categories.array'    => 'Invalid data format submitted.',
            'grant_categories.min'      => 'You must select at least one grant category.',
            'grant_categories.*.exists' => 'One or more selected categories are invalid.',
        ];
    }
}
