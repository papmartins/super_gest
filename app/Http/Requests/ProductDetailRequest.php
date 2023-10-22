<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'product_id' => 'exists:products,id',
            'quantidade' => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        $rules = [
            'product_id.exists' => 'O product não existe',
            'quantidade.required' => 'O :attribute de conter um valor válido'
        ];

        return $rules;
    }
}
