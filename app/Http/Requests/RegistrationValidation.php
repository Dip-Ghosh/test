<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'             => 'required',
            'email'            => 'required|email|unique:users',
            'password'         => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password'
        ];
    }
}
