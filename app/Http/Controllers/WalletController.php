<?php

namespace App\Http\Controllers;

use App\Http\Requests\Wallet\DepositRequest;
use App\Services\WalletService;

class WalletController extends Controller
{
    protected $service;

    public function __construct(WalletService $service)
    {
        $this->service = $service;
    }

    /**
     * Mostra token da carteira do usuário logado
     *
     * @param  \App\Http\Requests\User\UpdateUserRequest  $request
     * @return JsonResource
     */
    public function index()
    {
        return $this->service->showMyWallet();
    }

    /**
     * Mostra token da carteira do usuário logado
     *
     * @param  \App\Http\Requests\Wallet\DepositRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function deposit(DepositRequest $request)
    {
        return $this->service->depositMyAccount($request);
    }
}
