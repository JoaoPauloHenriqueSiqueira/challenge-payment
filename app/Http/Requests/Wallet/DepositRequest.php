<?php

namespace App\Http\Requests\Wallet;

use Illuminate\Foundation\Http\FormRequest;

class DepositRequest extends FormRequest
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
        return [
            'amount' => 'required|numeric|gt:0'
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => 'Necessário informar o valor(amount) a ser depositado',
            'amount.gt' => 'Valor(amount) precisa ser positivo',
        ];
    }
}
