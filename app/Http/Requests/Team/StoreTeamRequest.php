<?php

namespace App\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:teams,email'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2048'],
            'password' => ['required', 'string', 'min:6'],
            'users' => ['required', 'array', 'min:1'],
            'users.*.name' => ['required', 'string'],
            'users.*.image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2048'],
            'users.*.description' => ['nullable', 'string', 'max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'Команда с таким email уже существует',
        ];

    }

}
