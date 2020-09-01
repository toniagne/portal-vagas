<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobCategory extends FormRequest
{

    public function authorize()
    {

        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'icon' => 'required',
            'active' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nome é informação obrigatória',
            'icon.required'  => 'Selecione um ícone',
            'active.required'  => 'Selecione Ativo',
        ];
    }

}
