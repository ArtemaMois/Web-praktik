<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class VerifyEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => ['required', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'code.integer' => ['Код должен содержать только символы от 0 до 9'],
        ];
    }
}
