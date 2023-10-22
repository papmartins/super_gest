<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unit_id' => 'exists:units,id'
        ];

        return $rules;
    }

    public function messages()
    {
        $rules = [
            'required' => 'O campo :attribute deve ser preenchido',
            'name.min' => 'O campo nome deve ter no minimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no maximo 40 caracteres',
            'descricao.min' => 'O campo descricao deve ter no minimo 3 caracteres',
            'descricao.max' => 'O campo descricao deve ter no maximo 2000 caracteres',
            'peso.integer' => 'O campo peso tem que ser um inteiro',
            'unit_id.exists' => 'A unit de medida não existe'
        ];

        return $rules;
    }
}
