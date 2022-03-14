<?php

namespace App\Http\Requests\User;

use App\Helpers\Format;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'unique:users|required|email|max:255',
            'password' => 'confirmed|required|min:5|max:20',
            'cpf' => 'min:11|max:11|unique:users|required'
        ];

        return $valid;
    }

    public function getValidatorInstance()
    {
        $this->extractNumberCPF();
        return parent::getValidatorInstance();
    }

    private function extractNumberCPF()
    {
        if ($this->request->has('cpf')) {
            $this->merge([
                'cpf' => app(Format::class)->extractNumbers($this->request->get('cpf'))
            ]);
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Name é um campo obrigatório',
            'name.max' => 'São permitidas 255 letras para o campo nome',
            'email.unique' => 'Esse email já está registrado em nossa base',
            'email.required' => 'Email é um campo obrigatório',
            'email.email' => 'Email precisa ser um email válido',
            'email.max' => 'São permitidas 255 letras para o campo email',
            'password.confirmed' => 'Campo Password precisa ser confirmado',
            'password.required' => 'Password é um campo obrigatório',
            'password.min' => 'Password precisa ter no mínimo 5 caracteres',
            'password.max' => 'Password precisa ter no máximo 20 caracteres',
            'cpf.unique' => 'Esse CPF já está registrado em nossa base',
            'cpf.required' => 'CPF é um campo obrigatório',
            'cpf.min' => 'CPF precisa ter 14 campos (EX: 111.222.333-22)',
            'cpf.max' => 'CPF precisa ter 14 campos (EX: 111.222.333-22)',
        ];
    }
}
