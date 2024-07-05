<?php

namespace App\Http\Requests\Grade;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'design' => ['required', 'between:0,5'],
            'usability' => ['required', 'between:0,5'],
            'layout' => ['required', 'between:0,5'],
            'implementation' => ['required', 'between:0,5'],
        ];
    }

}
