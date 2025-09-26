<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoanControllerStoreRequest extends FormRequest
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
            'amount' => ['required', 'numeric'],
            'duration' => ['required', 'integer'],
            'facility' => ['required', 'string'],
            'purpose' => ['required', 'string', 'min:10', 'max:1000'],
            'monthly_income' => ['required', 'string'],
            'term_and_condition' => ['accepted'], // checkbox must be checked
        ];
    }
}
