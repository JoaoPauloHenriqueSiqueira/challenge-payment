<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'amount' => 'required|numeric|gt:0',
            'payee' => 'required|exists:wallets,uuid'

        ];
    }

    public function messages()
    {
        return [
            'amount.required' => 'Necessário informar o valor(amount) a ser pago',
            'amount.gt' => 'Valor(amount) precisa ser positivo',
            'payee.required' => 'Necessário informar o beneficiário(payee)',
            'payee.exists' => 'Carteira não encontrada em nossa base',
        ];
    }
}
