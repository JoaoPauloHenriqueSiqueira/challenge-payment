<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => 'max:255',
            'email' => 'unique:users|email|max:255',
            'password' => 'confirmed|min:5|max:20',
            'cpf' => 'unique:users'

        ];

        return $valid;
    }

    public function messages()
    {
        return [
            'name.max' => 'São permitidas 255 letras para o campo nome',
            'email.unique' => 'Esse email já está registrado em nossa base',
            'email.email' => 'Email precisa ser um email válido',
            'email.max' => 'São permitidas 255 letras para o campo email',
            'password.confirmed' => 'Campo Password precisa ser confirmado',
            'password.min' => 'Password precisa ter no mínimo 5 caracteres',
            'password.max' => 'Password precisa ter no máximo 20 caracteres',
            'cpf.unique' => 'Esse CPF já está registrado em nossa base',
        ];
    }
}
