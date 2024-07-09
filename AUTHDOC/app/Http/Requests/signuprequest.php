<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signuprequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email2' => 'required',
            'password' => 'required|min:6|max:20',
            'password_confirm' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'password.min' => 'Le mot de passe doit avoir au moins :min caractères.',
            'password.max' => 'Le mot de passe ne doit pas dépasser :max caractères.',
        ];
    }
}
