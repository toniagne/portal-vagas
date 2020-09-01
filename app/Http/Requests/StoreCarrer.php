<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarrer extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|string|unique:careers|max:45',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nome é informação obrigatória',
        ];
    }
}
