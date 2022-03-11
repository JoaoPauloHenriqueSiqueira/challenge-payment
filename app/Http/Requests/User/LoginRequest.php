<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $valid =  [
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ];

        return $valid;
    }

    public function messages()
    {
        return [
            'email.exists' => 'Usuário não encontrado em nossa base',
            'email.required' => 'Email é um campo obrigatório',
            'password.required' => 'Password é um campo obrigatório'
        ];
    }
}
