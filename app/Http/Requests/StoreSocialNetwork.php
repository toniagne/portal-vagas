<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocialNetwork extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:45',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nível é informação obrigatória',
        ];
    }
}
