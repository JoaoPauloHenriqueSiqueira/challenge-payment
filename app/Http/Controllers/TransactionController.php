<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\PaymentRequest;
use App\Services\TransactionService;

/**
 * @group Transaction endpoints
 */
class TransactionController extends Controller
{
    protected $service;

    public function __construct(TransactionService $service)
    {
        $this->service = $service;
    }

    /**
     * Amount a quantity to logged user's wallet.
     * 
     *@authenticated
     *
     * @bodyParam amount float required Amount to deposit. Example: 98.51
     * @bodyParam payee string required Payee (wallet's user to receive the money). Example: ads14c11-eaf2-49a5-ad5d-70b2d3de590b
     * 
     * @response 200
     *{
     *   "payload": {
     *       "value": "R$98.51",
     *       "payer": "d0b14c11-eaf2-49a5-ad5d-70b2d3de590b",
     *       "payee": "ads14c11-eaf2-49a5-ad5d-70b2d3de590b"
     *   },
     *   "message": "Valor pago com sucesso. Enviamos uma notificação para o(a) Sr(a). José"
     *}
     *
     *   
     * @response status=422 scenario="Validation error" 
     *{
     *   "message": "The given data was invalid.",
     *   "errors": {
     *       "amount": [
     *           "Necessário informar o valor(amount) a ser pago"
     *       ]
     *   }
     *}
     * @response status=422 scenario="Wallet not found" 
     *{
     *   "message": "The given data was invalid.",
     *   "errors": {
     *       "payee": [
     *           "Carteira não encontrada em nossa base"
     *       ]
     *   }
     *}
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pay(PaymentRequest $request)
    {
        return $this->service->deposit($request);
    }
}
