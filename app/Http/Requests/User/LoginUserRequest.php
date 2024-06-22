<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login' => ['required', 'string', 'exists:teams,login'],
            'password' => ['required']
        ];

    }

    public function messages(): array
    {
         return [
             "login.exists" => ['Команда с таким логином не зарегистрирована']
         ];
    }
}
