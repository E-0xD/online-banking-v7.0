<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminWalletStoreRequest extends FormRequest
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
            'symbol' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'network' => ['required', 'string', 'max:255'],
            'qr_code_path' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'balance' => ['required', 'numeric'],
            'status' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ];
    }
}
