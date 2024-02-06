<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
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
            'region' => 'required|alpha',
            'city' => 'required|alpha',
            'street' => 'required|alpha',
            'building' => 'required|numeric',
            'mail_index' => 'required|numeric|digits_between:6,6',
            'user_id' => 'required|numeric',
        ];
    }
}
