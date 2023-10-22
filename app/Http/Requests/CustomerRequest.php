<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|min:3|max:40'
        ];
        
        return $rules;
    }

    public function messages()
    {
        $rules = [
            'name.min' => 'O campo nome deve ter no minimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no maximo 40 caracteres'
        ];

        return $rules;
    }
}
