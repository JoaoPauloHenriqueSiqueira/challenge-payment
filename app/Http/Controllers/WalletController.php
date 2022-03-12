<?php

namespace App\Http\Controllers;

use App\Http\Requests\Wallet\DepositRequest;
use App\Services\WalletService;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @group Wallet endpoints
 */
class WalletController extends Controller
{
    protected $service;

    public function __construct(WalletService $service)
    {
        $this->service = $service;
    }

    /**
     * Show logged user's wallet.
     * 
     *@authenticated
     *
     * @response 200 scenario
     *{
     *   "data": {
     *       "token": "d0b14c11-eaf2-49a5-ad5d-70b2d3de590b",
     *       "balance": "R$23,00",
     *       "received_history": [],
     *      "payment_history": [
     *           {
     *               "date": "12/03/2022 01:36:02",
     *               "value": "R$1,00",
     *               "user": {
     *                   "id": 7,
     *                   "name": "José",
     *                   "email": "jos2e@gmail.com",
     *                   "cpf": "***.412.261-**",
     *                   "wallet": {
     *                       "token": "ads14c11-eaf2-49a5-ad5d-70b2d3de590b"
     *                   }
     *               }
     *           },
     *           {
     *               "date": "12/03/2022 01:36:11",
     *               "value": "R$12,00",
     *               "user": {
     *                   "id": 7,
     *                   "name": "José",
     *                   "email": "jos2e@gmail.com",
     *                   "cpf": "***.412.261-**",
     *                   "wallet": {
     *                       "token": "ads14c11-eaf2-49a5-ad5d-70b2d3de590b"
     *                   }
     *               }
     *           }
     *       ]
     *  }
     *}
     *
     * @return Illuminate\Http\Resources\Json\JsonResource
     */
    public function index(): JsonResource
    {
        return $this->service->showMyWallet();
    }

    /**
     * Amount a quantity to logged user's wallet.
     * 
     *@authenticated
     *
     * @bodyParam amount float required Amount to deposit. Example: 98.51
     *
     * @response 200
     *{
     *   "message": "Valor depositado com sucesso"
     *}
     *   
     * @response status=422 scenario="Validation error" 
     *{
     *   "message": "The given data was invalid.",
     *   "errors": {
     *       "amount": [
     *           "Necessário informar o valor(amount) a ser depositado"
     *       ]
     *   }
     *}
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deposit(DepositRequest $request)
    {
        return $this->service->depositMyAccount($request);
    }
}
