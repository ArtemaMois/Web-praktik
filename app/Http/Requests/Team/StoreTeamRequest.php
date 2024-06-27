<?php

namespace App\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'login' => ['required', 'string', 'unique:teams,login', 'max:100'],
            'email' => ['required', 'email', 'unique:teams,email'],
            'image' => ['required', 'mimes:jpeg,jpg,png', 'max:2048'],
            'password' => ['required', 'string', 'min:6'],
            'users' => ['required', 'array', 'min:1'],
            'users.*.name' => ['nullable', 'string'],
            'users.*.image' => ['required', 'mimes:jpeg,jpg,png', 'max:2048'],
            'users.*.description' => ['nullable', 'string', 'max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'login.unique' => "Команда с таким названием уже существует",
            'email.unique' => 'Команда с таким email уже существует',
        ];

    }

}
