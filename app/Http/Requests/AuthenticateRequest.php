<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'user' => 'email',
            'password' => 'required'       
        ];

        return $rules;
    }

    public function messages()
    {
        $rules = [
            'user.email' => 'O campo usuário (email) é obrigatório',
            'password.required' => 'O campo senha é obrigatório'
        ];

        return $rules;
    }
}
