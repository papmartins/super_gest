<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|min:3|max:40|unique:site_contacts',
            'phone' => 'required',
            'email' => 'email',
            'contact_reason_id' => 'required',
            'message' => 'required|max:2000'
        ];

        return $rules;
    }

    public function messages()
    {
        $rules = [
            'name.min' => 'O campo nome precisa de ter no mínimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'name.unique' => 'O nome já está ser utilizado',
            'email' => 'O email não é válido',
            'message.max' => 'A mensagem só pode ter 2000 caracteres',
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        return $rules;
    }
}
