<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class ResendMailRequest extends FormRequest
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
            'email' => ['required', 'email', 'exists:teams,email'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => ['Введите email'],
            'email.email' => ['Адрес электронной почты должен быть правильным'],
            'email.exists' => ['Команда с таким email не зарегистрирована']
        ];
    }
}
