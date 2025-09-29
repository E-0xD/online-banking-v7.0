<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardControllerStoreRequest extends FormRequest
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
            'card_type'         => 'required|in:Visa,Mastercard,American Express',
            'card_level'        => 'required|string|max:50',
            'currency'          => 'required|string|max:50',
            'daily_limit'       => 'required|numeric|min:100|max:5000',

            'card_holder_name'  => 'required|string|max:255',
            'billing_address'   => 'required|string|max:255',
            'city'              => 'required|string|max:100',
            'zip'               => 'required|string|max:20',

            'terms'             => 'accepted',
        ];
    }
}
