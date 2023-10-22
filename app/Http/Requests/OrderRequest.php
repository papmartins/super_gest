<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'client_id' => 'exists:customers,id'
        ];

        return $rules;
    }

    public function messages()
    {
        $rules = [
            'client_id.exists' => 'O customer não existe'
        ];

        return $rules;
    }
}
