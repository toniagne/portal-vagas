<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProficiency extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'level' => 'required|string|max:45',
        ];
    }
    public function messages()
    {
        return [
            'level.required' => 'Nível é informação obrigatória',
        ];
    }
}
