<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'supplier_id' => 'exists:suppliers,id',
            'name' => 'required|min:3|max:40',
            'description' => 'required|min:3|max:2000',
            'weight' => 'required|integer',
            'unit_id' => 'exists:units,id'
        ];

        return $rules;
    }

    public function messages()
    {
        $rules = [
            'supplier_id.exists' => 'O supplier não existe não existe',
            'required' => 'O campo :attribute deve ser preenchido',
            'name.min' => 'O campo nome deve ter no minimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no maximo 40 caracteres',
            'description.min' => 'O campo descricao deve ter no minimo 3 caracteres',
            'description.max' => 'O campo descricao deve ter no maximo 2000 caracteres',
            'weight.integer' => 'O campo peso tem que ser um inteiro',
            'unit_id.exists' => 'A unit de medida não existe'
        ];

        return $rules;
    }
}
